<?php
/**
 * Fetch and normalize Maz Timex plans from the portal public catalog API.
 */

if (!defined('TIMEX_SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}

/**
 * @return array{plans: array<int, array>, source: string}|null
 *         null only when neither live/cache nor usable data is available
 */
function timex_fetch_portal_plans($forceRefresh = false) {
    $cacheFile = __DIR__ . '/../cache/plans.json';
    $ttl = defined('TIMEX_PLANS_CACHE_TTL') ? (int) TIMEX_PLANS_CACHE_TTL : 600;

    if (!$forceRefresh && is_file($cacheFile)) {
        $cached = timex_read_plans_cache($cacheFile, $ttl);
        if ($cached !== null) {
            return [
                'plans' => $cached['plans'],
                'source' => 'cache',
            ];
        }
    }

    $live = timex_request_portal_plans();
    if ($live !== null && !empty($live)) {
        timex_write_plans_cache($cacheFile, $live);
        return [
            'plans' => $live,
            'source' => 'live',
        ];
    }

    // Stale cache is better than nothing when upstream is down
    if (is_file($cacheFile)) {
        $stale = timex_read_plans_cache($cacheFile, PHP_INT_MAX);
        if ($stale !== null && !empty($stale['plans'])) {
            return [
                'plans' => $stale['plans'],
                'source' => 'cache',
            ];
        }
    }

    return null;
}

/**
 * @return array<int, array>|null
 */
function timex_request_portal_plans() {
    $url = get_plans_endpoint_url('timex');
    $timeout = defined('TIMEX_PLANS_TIMEOUT') ? (int) TIMEX_PLANS_TIMEOUT : 5;

    $raw = timex_http_get($url, $timeout);
    if ($raw === null || $raw === '') {
        return null;
    }

    $json = json_decode($raw, true);
    if (!is_array($json) || empty($json['data']) || !is_array($json['data'])) {
        return null;
    }

    $plans = [];
    foreach ($json['data'] as $row) {
        if (!is_array($row)) {
            continue;
        }
        $normalized = timex_normalize_portal_plan($row);
        if ($normalized !== null) {
            $plans[] = $normalized;
        }
    }

    if (empty($plans)) {
        return null;
    }

    usort($plans, function ($a, $b) {
        return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0);
    });

    // Marketing page shows paid/catalog tiers, not the free trial plan row
    $plans = array_values(array_filter($plans, function ($p) {
        return strtolower((string) ($p['code'] ?? '')) !== 'trial';
    }));

    return empty($plans) ? null : $plans;
}

/**
 * GET helper: curl extension → file_get_contents → curl.exe CLI.
 *
 * @return string|null response body
 */
function timex_http_get($url, $timeout = 5) {
    $timeout = max(1, (int) $timeout);

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_CONNECTTIMEOUT => $timeout,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'User-Agent: MazTimexMarketing/1.0',
            ],
        ]);
        $body = curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($body !== false && $code >= 200 && $code < 300) {
            return $body;
        }
    }

    if (ini_get('allow_url_fopen')) {
        $ctx = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => $timeout,
                'header' => "Accept: application/json\r\nUser-Agent: MazTimexMarketing/1.0\r\n",
                'ignore_errors' => true,
            ],
            'ssl' => [
                'verify_peer' => true,
                'verify_peer_name' => true,
            ],
        ]);
        $raw = @file_get_contents($url, false, $ctx);
        $status = 0;
        if (!empty($http_response_header[0]) && preg_match('/\s(\d{3})\s/', $http_response_header[0], $m)) {
            $status = (int) $m[1];
        }
        if ($raw !== false && $status >= 200 && $status < 300) {
            return $raw;
        }
        // Some builds omit headers on success; accept JSON body if parseable
        if ($raw !== false && $raw !== '' && $status === 0) {
            $probe = json_decode($raw, true);
            if (is_array($probe) && isset($probe['data'])) {
                return $raw;
            }
        }
    }

    // Windows / hosts without openssl or curl PHP extensions can still use curl CLI
    $curlBin = timex_find_curl_binary();
    if ($curlBin !== null) {
        $tmpBody = tempnam(sys_get_temp_dir(), 'ppb');
        $tmpHdr = tempnam(sys_get_temp_dir(), 'pph');
        if ($tmpBody !== false && $tmpHdr !== false) {
            $cmd = escapeshellarg($curlBin)
                . ' -sS -L --max-time ' . (int) $timeout
                . ' -H ' . escapeshellarg('Accept: application/json')
                . ' -H ' . escapeshellarg('User-Agent: MazTimexMarketing/1.0')
                . ' -D ' . escapeshellarg($tmpHdr)
                . ' -o ' . escapeshellarg($tmpBody)
                . ' ' . escapeshellarg($url);
            $out = [];
            $exit = 1;
            @exec($cmd, $out, $exit);
            $body = is_file($tmpBody) ? (string) @file_get_contents($tmpBody) : '';
            $hdr = is_file($tmpHdr) ? (string) @file_get_contents($tmpHdr) : '';
            @unlink($tmpBody);
            @unlink($tmpHdr);
            $code = 0;
            if ($hdr !== '' && preg_match('/HTTP\/\S+\s+(\d{3})/i', $hdr, $m)) {
                // Last status line wins when following redirects
                if (preg_match_all('/HTTP\/\S+\s+(\d{3})/i', $hdr, $all) && !empty($all[1])) {
                    $code = (int) end($all[1]);
                } else {
                    $code = (int) $m[1];
                }
            }
            if ($exit === 0 && $code >= 200 && $code < 300 && $body !== '') {
                return $body;
            }
        }
    }

    return null;
}

/**
 * @return string|null path to curl executable
 */
function timex_find_curl_binary() {
    static $cached = false;
    static $bin = null;
    if ($cached) {
        return $bin;
    }
    $cached = true;

    if (stripos(PHP_OS_FAMILY, 'Windows') !== false) {
        $where = [];
        @exec('where curl 2>NUL', $where, $code);
        if ($code === 0 && !empty($where[0]) && is_file($where[0])) {
            $bin = $where[0];
            return $bin;
        }
        // Common on Windows 10+
        if (is_file('C:\\Windows\\System32\\curl.exe')) {
            $bin = 'C:\\Windows\\System32\\curl.exe';
            return $bin;
        }
    } else {
        $which = [];
        @exec('command -v curl 2>/dev/null', $which, $code);
        if ($code === 0 && !empty($which[0])) {
            $bin = trim($which[0]);
            return $bin;
        }
    }

    $bin = null;
    return $bin;
}

/**
 * @param array $p
 * @return array|null
 */
function timex_normalize_portal_plan(array $p) {
    $code = trim((string) ($p['plan_code'] ?? ''));
    $name = trim((string) ($p['plan_name'] ?? $p['name'] ?? $code));
    if ($code === '' && $name === '') {
        return null;
    }

    $monthly = isset($p['monthly_price']) ? (float) $p['monthly_price'] : 0.0;
    $yearly = isset($p['yearly_price']) ? (float) $p['yearly_price'] : 0.0;
    $currency = strtoupper(trim((string) ($p['currency'] ?? 'INR')));
    $isQuote = !empty($p['is_quote']);
    $monthlyEnabled = array_key_exists('monthly_enabled', $p)
        ? !empty($p['monthly_enabled'])
        : (!$isQuote && $monthly > 0);
    $yearlyEnabled = array_key_exists('yearly_enabled', $p)
        ? !empty($p['yearly_enabled'])
        : (!$isQuote && $yearly > 0);
    $billingCycle = strtolower(trim((string) ($p['billing_cycle'] ?? '')));
    if ($billingCycle === '') {
        if ($monthlyEnabled && $yearlyEnabled) {
            $billingCycle = 'both';
        } elseif ($yearlyEnabled) {
            $billingCycle = 'yearly';
        } elseif ($monthlyEnabled) {
            $billingCycle = 'monthly';
        }
    }

    $parsed = timex_parse_feature_payload($p);
    $featureGroups = $parsed['groups'];
    $limits = $parsed['limits'];
    $features = $parsed['flat'];

    // Prefer structured features; only fall back to display_labels when features are missing
    if (empty($features) && !empty($p['display_labels']) && is_array($p['display_labels'])) {
        $labels = $p['display_labels'];
        usort($labels, function ($a, $b) {
            $ao = is_array($a) ? (int) ($a['sort_order'] ?? 0) : 0;
            $bo = is_array($b) ? (int) ($b['sort_order'] ?? 0) : 0;
            return $ao <=> $bo;
        });
        foreach ($labels as $d) {
            if (!is_array($d)) {
                continue;
            }
            $label = trim((string) ($d['label'] ?? ''));
            if ($label !== '') {
                $features[] = $label;
            }
        }
    }

    if (empty($features) && !empty($p['included_features']) && is_array($p['included_features'])) {
        foreach (array_slice($p['included_features'], 0, 12) as $feat) {
            $features[] = is_string($feat) ? $feat : (string) $feat;
        }
    }

    $addons = timex_normalize_addons($p['addons'] ?? []);
    $offer = timex_select_eligible_offer(
        $p['eligible_offers'] ?? [],
        $monthly,
        $yearly,
        $monthlyEnabled,
        $yearlyEnabled,
        $currency
    );
    $commitmentOffers = timex_select_commitment_offers(
        $p['eligible_offers'] ?? [],
        $currency
    );

    $iconMap = [
        'basic' => ['blue', 'fa-seedling'],
        'starter' => ['blue', 'fa-seedling'],
        'standard' => ['navy', 'fa-briefcase'],
        'professional' => ['slate', 'fa-building'],
        'enterprise' => ['slate', 'fa-building'],
        'growth' => ['navy', 'fa-briefcase'],
        'business' => ['slate', 'fa-building'],
    ];
    $key = strtolower($code !== '' ? $code : $name);
    $icon = $iconMap[$key] ?? ['blue', 'fa-coins'];

    $showMonthly = $monthlyEnabled && !$isQuote && $monthly > 0;
    $showYearly = $yearlyEnabled && !$isQuote && $yearly > 0;

    return [
        'code' => $code !== '' ? $code : $key,
        'name' => $name,
        'blurb' => trim((string) ($p['short_description'] ?? $p['description'] ?? '')),
        'monthly' => $monthly,
        'yearly' => $yearly,
        'currency' => $currency,
        'monthly_enabled' => $monthlyEnabled,
        'yearly_enabled' => $yearlyEnabled,
        'billing_cycle' => $billingCycle,
        'monthly_label' => $showMonthly ? timex_format_money($monthly, $currency) : '',
        'yearly_label' => $showYearly ? timex_format_money($yearly, $currency) : '',
        'popular' => !empty($p['is_popular']),
        'is_quote' => $isQuote,
        'trial_days' => isset($p['trial_days']) ? (int) $p['trial_days'] : null,
        'trial_enabled' => !empty($p['trial_enabled']),
        'sort_order' => isset($p['sort_order']) ? (int) $p['sort_order'] : 0,
        'features' => $features,
        'feature_groups' => $featureGroups,
        'limits' => $limits,
        'addons' => $addons,
        'offer' => $offer,
        'commitment_offers' => $commitmentOffers,
        'icon' => $icon[0],
        'icon_fa' => $icon[1],
    ];
}

/**
 * Parse categorized features into groups, capacity limits, and flat labels.
 *
 * @param array $p
 * @return array{groups: array<int, array>, limits: array<int, array>, flat: array<int, string>}
 */
function timex_parse_feature_payload(array $p) {
    $groups = [];
    $limits = [];
    $flat = [];
    $rawFeatures = $p['features'] ?? null;

    if (!is_array($rawFeatures) || empty($rawFeatures)) {
        return ['groups' => [], 'limits' => [], 'flat' => []];
    }

    // Associative category map (workspace API) vs flat list
    $isAssoc = array_keys($rawFeatures) !== range(0, count($rawFeatures) - 1);
    if ($isAssoc) {
        foreach ($rawFeatures as $category => $items) {
            if (!is_array($items)) {
                continue;
            }
            $catName = is_string($category) ? trim($category) : 'Features';
            if ($catName === '') {
                $catName = 'Features';
            }
            $groupItems = [];
            usort($items, function ($a, $b) {
                $ao = is_array($a) ? (int) ($a['sort_order'] ?? 0) : 0;
                $bo = is_array($b) ? (int) ($b['sort_order'] ?? 0) : 0;
                return $ao <=> $bo;
            });
            foreach ($items as $item) {
                if (!is_array($item) || empty($item['is_included'])) {
                    continue;
                }
                $featName = trim((string) ($item['feature_name'] ?? $item['name'] ?? ''));
                if ($featName === '') {
                    continue;
                }
                $code = trim((string) ($item['feature_code'] ?? ''));
                $desc = trim((string) ($item['description'] ?? ''));
                $groupItems[] = [
                    'code' => $code,
                    'name' => $featName,
                    'description' => $desc,
                ];
                $flat[] = $featName;
                $limitRow = timex_feature_to_limit($item, $catName);
                if ($limitRow !== null) {
                    $limits[] = $limitRow;
                }
            }
            if (!empty($groupItems)) {
                $groups[] = [
                    'category' => $catName,
                    'icon' => timex_feature_category_icon($catName),
                    'items' => $groupItems,
                ];
            }
        }
    }

    usort($limits, function ($a, $b) {
        return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0);
    });

    return [
        'groups' => $groups,
        'limits' => $limits,
        'flat' => $flat,
    ];
}

/**
 * @param array $item
 * @param string $category
 * @return array|null
 */
function timex_feature_to_limit(array $item, $category) {
    $isUnlimited = !empty($item['is_unlimited']);
    $limitRaw = $item['limit_value'] ?? null;

    if (!$isUnlimited && ($limitRaw === null || $limitRaw === '')) {
        return null;
    }

    $limitValue = is_numeric($limitRaw) ? (float) $limitRaw : null;
    // -1 often means unlimited even when is_unlimited is false
    if ($limitValue !== null && $limitValue < 0) {
        $isUnlimited = true;
        $limitValue = null;
    }

    $name = trim((string) ($item['feature_name'] ?? $item['name'] ?? ''));
    if ($name === '') {
        return null;
    }

    $unit = '';
    $code = strtolower(trim((string) ($item['feature_code'] ?? '')));
    if ($code === 'storage' || stripos($name, 'storage') !== false) {
        $unit = 'GB';
    }

    $display = $isUnlimited
        ? 'Unlimited'
        : timex_format_indian_number($limitValue) . ($unit !== '' ? ' ' . $unit : '');

    return [
        'code' => $code,
        'name' => $name,
        'category' => $category,
        'limit_value' => $isUnlimited ? null : $limitValue,
        'is_unlimited' => $isUnlimited,
        'unit' => $unit,
        'display' => $display,
        'sort_order' => isset($item['sort_order']) ? (int) $item['sort_order'] : 0,
    ];
}

function timex_feature_category_icon($category) {
    $map = [
        'Business' => 'fa-building',
        'Usage' => 'fa-hard-drive',
        'Workforce' => 'fa-users',
        'Leave' => 'fa-calendar-check',
        'Projects' => 'fa-diagram-project',
        'Integrations' => 'fa-plug',
        'Time' => 'fa-clock',
        'Shifts' => 'fa-business-time',
        'Location' => 'fa-location-dot',
        'Approvals' => 'fa-check-double',
        'Automation' => 'fa-wand-magic-sparkles',
        'Analytics' => 'fa-chart-line',
        'HR' => 'fa-id-card',
        'Data' => 'fa-database',
        'Platform' => 'fa-layer-group',
        'Security' => 'fa-shield-halved',
    ];
    return $map[$category] ?? 'fa-circle-check';
}

/**
 * @param mixed $addons
 * @return array<int, array>
 */
function timex_normalize_addons($addons) {
    if (!is_array($addons) || empty($addons)) {
        return [];
    }
    $out = [];
    foreach ($addons as $addon) {
        if (!is_array($addon)) {
            continue;
        }
        $name = trim((string) ($addon['name'] ?? $addon['addon_name'] ?? $addon['label'] ?? ''));
        if ($name === '') {
            continue;
        }
        $out[] = [
            'code' => trim((string) ($addon['code'] ?? $addon['addon_code'] ?? '')),
            'name' => $name,
            'description' => trim((string) ($addon['description'] ?? '')),
            'price_label' => isset($addon['price'])
                ? timex_format_money((float) $addon['price'], (string) ($addon['currency'] ?? 'INR'))
                : trim((string) ($addon['price_label'] ?? '')),
        ];
    }
    return $out;
}

/**
 * Pick the best active eligible offer for display.
 *
 * @param mixed $offers
 * @return array|null
 */
function timex_select_eligible_offer($offers, $monthly, $yearly, $monthlyEnabled, $yearlyEnabled, $currency = 'INR') {
    if (!is_array($offers) || empty($offers)) {
        return null;
    }

    $preferredCycle = $yearlyEnabled ? 'yearly' : ($monthlyEnabled ? 'monthly' : '');
    $candidates = [];

    foreach ($offers as $row) {
        if (!is_array($row)) {
            continue;
        }
        if (!timex_offer_is_in_window($row)) {
            continue;
        }
        $cycle = strtolower(trim((string) ($row['billing_cycle'] ?? '')));
        if ($cycle === 'yearly' && !$yearlyEnabled) {
            continue;
        }
        if ($cycle === 'monthly' && !$monthlyEnabled) {
            continue;
        }
        $candidates[] = $row;
    }

    if (empty($candidates)) {
        return null;
    }

    usort($candidates, function ($a, $b) use ($preferredCycle) {
        $ac = strtolower(trim((string) ($a['billing_cycle'] ?? '')));
        $bc = strtolower(trim((string) ($b['billing_cycle'] ?? '')));
        $ap = ($preferredCycle !== '' && $ac === $preferredCycle) ? 0 : 1;
        $bp = ($preferredCycle !== '' && $bc === $preferredCycle) ? 0 : 1;
        if ($ap !== $bp) {
            return $ap <=> $bp;
        }
        return ((int) ($a['id'] ?? 0)) <=> ((int) ($b['id'] ?? 0));
    });

    $row = $candidates[0];
    $cycle = strtolower(trim((string) ($row['billing_cycle'] ?? $preferredCycle)));
    if ($cycle !== 'monthly' && $cycle !== 'yearly') {
        $cycle = $preferredCycle !== '' ? $preferredCycle : 'yearly';
    }

    $offerCurrency = strtoupper(trim((string) ($row['currency'] ?? $currency)));
    if (array_key_exists('charge_amount', $row) && $row['charge_amount'] !== null && $row['charge_amount'] !== '') {
        $price = (float) $row['charge_amount'];
    } else {
        $price = isset($row['offer_price']) ? (float) $row['offer_price'] : 0.0;
    }

    $regular = $cycle === 'monthly' ? (float) $monthly : (float) $yearly;
    $savings = max(0, $regular - $price);
    $duration = isset($row['offer_duration']) ? (int) $row['offer_duration'] : 0;
    $periodUnit = $cycle === 'monthly' ? '/month' : '/year';

    return [
        'id' => isset($row['id']) ? (int) $row['id'] : null,
        'name' => trim((string) ($row['offer_name'] ?? 'Special offer')),
        'duration_months' => $duration > 0 ? $duration : null,
        'price' => $price,
        'price_label' => timex_format_money($price, $offerCurrency),
        'currency' => $offerCurrency,
        'billing_cycle' => $cycle,
        'period_unit' => $periodUnit,
        'regular_price' => $regular,
        'regular_label' => $regular > 0 ? timex_format_money($regular, $offerCurrency) : '',
        'savings' => $savings,
        'savings_label' => $savings > 0 ? timex_format_money($savings, $offerCurrency) : '',
        'start_date' => $row['start_date'] ?? null,
        'end_date' => $row['end_date'] ?? null,
        'active' => true,
    ];
}

/**
 * Default 6- and 12-month commitment offers (marketing fallback).
 *
 * @return array<int, array>
 */
function timex_default_commitment_offers() {
    return [
        [
            'months' => 6,
            'total' => 3594.0,
            'effective_monthly' => 599.0,
            'name' => '6 Months',
            'blurb' => 'Get started with a flexible 6-month commitment.',
            'cta_label' => 'Choose 6 Months',
            'best_value' => false,
            'currency' => 'INR',
        ],
        [
            'months' => 12,
            'total' => 5988.0,
            'effective_monthly' => 499.0,
            'name' => '12 Months',
            'blurb' => 'Save more with our 12-month offer and enjoy Timex for a full year.',
            'cta_label' => 'Choose 12 Months',
            'best_value' => true,
            'currency' => 'INR',
        ],
    ];
}

/**
 * Normalize a commitment offer row for the pricing page.
 *
 * @param array $row
 * @return array
 */
function timex_normalize_commitment_offer(array $row, $currency = 'INR') {
    $months = (int) ($row['months'] ?? $row['offer_duration'] ?? 0);
    $offerCurrency = strtoupper(trim((string) ($row['currency'] ?? $currency)));
    if ($offerCurrency === '') {
        $offerCurrency = 'INR';
    }

    if (isset($row['total'])) {
        $total = (float) $row['total'];
    } elseif (array_key_exists('charge_amount', $row) && $row['charge_amount'] !== null && $row['charge_amount'] !== '') {
        $total = (float) $row['charge_amount'];
    } else {
        $total = isset($row['offer_price']) ? (float) $row['offer_price'] : 0.0;
    }

    if (isset($row['effective_monthly']) && (float) $row['effective_monthly'] > 0) {
        $monthly = (float) $row['effective_monthly'];
    } elseif ($months > 0 && $total > 0) {
        $monthly = $total / $months;
    } else {
        $monthly = 0.0;
    }

    $name = trim((string) ($row['name'] ?? $row['offer_name'] ?? ''));
    if ($name === '' && $months > 0) {
        $name = $months . ' Months';
    }

    $blurb = trim((string) ($row['blurb'] ?? ''));
    if ($blurb === '') {
        $blurb = $months === 12
            ? 'Save more with our 12-month offer and enjoy Timex for a full year.'
            : 'Get started with a flexible ' . $months . '-month commitment.';
    }

    $cta = trim((string) ($row['cta_label'] ?? ''));
    if ($cta === '') {
        $cta = 'Choose ' . ($months > 0 ? $months . ' Months' : 'Offer');
    }

    return [
        'id' => isset($row['id']) ? (int) $row['id'] : null,
        'months' => $months,
        'name' => $name,
        'blurb' => $blurb,
        'cta_label' => $cta,
        'best_value' => !empty($row['best_value']) || $months === 12,
        'total' => $total,
        'total_label' => $total > 0 ? timex_format_money($total, $offerCurrency) : '',
        'effective_monthly' => $monthly,
        'monthly_label' => $monthly > 0 ? timex_format_money($monthly, $offerCurrency) : '',
        'currency' => $offerCurrency,
        'active' => true,
        'compare_monthly' => 0.0,
        'compare_monthly_label' => '',
        'save_percent' => null,
        'save_caption' => '',
    ];
}

/**
 * Split a formatted money label into major + decimal parts for display.
 *
 * @param string $label
 * @return array{major: string, minor: string}
 */
function timex_split_money_label($label) {
    $label = (string) $label;
    if (preg_match('/^(.*?)(\.\d+)$/u', $label, $m)) {
        return [
            'major' => $m[1],
            'minor' => $m[2],
        ];
    }
    return [
        'major' => $label,
        'minor' => '',
    ];
}

/**
 * Add struck compare price + save caption (Stripe-style hierarchy) across commitment offers.
 *
 * @param array<int, array> $offers
 * @return array<int, array>
 */
function timex_enrich_commitment_offer_display(array $offers) {
    $refMonthly = 0.0;
    $currency = 'INR';
    foreach ($offers as $offer) {
        $refMonthly = max($refMonthly, (float) ($offer['effective_monthly'] ?? 0));
        if (!empty($offer['currency'])) {
            $currency = (string) $offer['currency'];
        }
    }

    foreach ($offers as &$offer) {
        $monthly = (float) ($offer['effective_monthly'] ?? 0);
        $months = (int) ($offer['months'] ?? 0);
        $parts = timex_split_money_label($offer['monthly_label'] ?? '');
        $offer['monthly_major'] = $parts['major'];
        $offer['monthly_minor'] = $parts['minor'];

        $offer['compare_monthly'] = 0.0;
        $offer['compare_monthly_label'] = '';
        $offer['save_percent'] = null;
        $offer['save_caption'] = '';

        if ($refMonthly > 0 && $monthly > 0 && $monthly < $refMonthly - 0.009) {
            $save = $refMonthly - $monthly;
            $pct = (int) round(($save / $refMonthly) * 100);
            $compareLabel = timex_format_money($refMonthly, $currency);
            $offer['compare_monthly'] = $refMonthly;
            $offer['compare_monthly_label'] = $compareLabel;
            $offer['save_percent'] = $pct > 0 ? $pct : null;
            if ($pct > 0 && $months > 0) {
                $offer['save_caption'] = 'Save ' . $pct . '% for ' . $months
                    . ' months, then ' . $compareLabel . '/mo';
            } elseif ($months > 0) {
                $offer['save_caption'] = 'Save ' . timex_format_money($save, $currency)
                    . ' every month for ' . $months . ' months';
            }
        } elseif ($months > 0 && !empty($offer['total_label'])) {
            $offer['save_caption'] = $offer['total_label'] . ' total for ' . $months . ' months';
        }
    }
    unset($offer);

    return $offers;
}

/**
 * Resolve 6- and 12-month commitment offers from catalog rows, filling gaps from fallback.
 *
 * @param mixed $offers
 * @param array<int, array>|null $fallback
 * @return array<int, array>
 */
function timex_select_commitment_offers($offers, $currency = 'INR', $fallback = null) {
    $wanted = [6, 12];
    $found = [];

    if (is_array($offers)) {
        foreach ($offers as $row) {
            if (!is_array($row)) {
                continue;
            }
            if (!timex_offer_is_in_window($row)) {
                continue;
            }
            $duration = (int) ($row['offer_duration'] ?? $row['months'] ?? 0);
            if (!in_array($duration, $wanted, true) || isset($found[$duration])) {
                continue;
            }
            $normalized = timex_normalize_commitment_offer(array_merge($row, ['months' => $duration]), $currency);
            if ($normalized['total'] <= 0 && $normalized['effective_monthly'] <= 0) {
                continue;
            }
            $found[$duration] = $normalized;
        }
    }

    $fallbackRows = is_array($fallback) && !empty($fallback)
        ? $fallback
        : timex_default_commitment_offers();

    $out = [];
    foreach ($wanted as $months) {
        if (isset($found[$months])) {
            $item = $found[$months];
        } else {
            $fb = null;
            foreach ($fallbackRows as $row) {
                if ((int) ($row['months'] ?? 0) === $months) {
                    $fb = $row;
                    break;
                }
            }
            if ($fb === null) {
                continue;
            }
            $item = timex_normalize_commitment_offer($fb, $currency);
        }
        $item['best_value'] = ($months === 12);
        $out[] = $item;
    }

    return timex_enrich_commitment_offer_display($out);
}

/**
 * Signup URL with commitment length for checkout context.
 *
 * @param int $months
 * @return string
 */
function timex_signup_commitment_url($months) {
    $url = TIMEX_SIGNUP_URL;
    $sep = (strpos($url, '?') !== false) ? '&' : '?';
    return $url . $sep . 'commitment=' . (int) $months;
}

/**
 * Monthly savings of the longer offer vs the shorter one.
 *
 * @param array<int, array> $offers
 * @return array{amount: float, label: string}|null
 */
function timex_commitment_monthly_savings(array $offers) {
    $byMonths = [];
    foreach ($offers as $offer) {
        $m = (int) ($offer['months'] ?? 0);
        if ($m > 0) {
            $byMonths[$m] = (float) ($offer['effective_monthly'] ?? 0);
        }
    }
    if (empty($byMonths[6]) || empty($byMonths[12])) {
        return null;
    }
    $save = max(0, $byMonths[6] - $byMonths[12]);
    if ($save <= 0) {
        return null;
    }
    $currency = 'INR';
    foreach ($offers as $offer) {
        if (!empty($offer['currency'])) {
            $currency = (string) $offer['currency'];
            break;
        }
    }
    return [
        'amount' => $save,
        'label' => timex_format_money($save, $currency),
    ];
}

/**
 * @param array $row
 * @return bool
 */
function timex_offer_is_in_window(array $row) {
    $now = time();
    $start = timex_parse_offer_date($row['start_date'] ?? null);
    $end = timex_parse_offer_date($row['end_date'] ?? null);
    if ($start !== null && $now < $start) {
        return false;
    }
    if ($end !== null && $now > $end) {
        return false;
    }
    return true;
}

/**
 * @param mixed $value
 * @return int|null unix timestamp
 */
function timex_parse_offer_date($value) {
    if ($value === null || $value === '') {
        return null;
    }
    if (is_numeric($value)) {
        return (int) $value;
    }
    $ts = strtotime((string) $value);
    return $ts === false ? null : $ts;
}

/**
 * Select the single plan to feature on the pricing page.
 *
 * @param array<int, array> $plans
 * @return array|null
 */
function timex_select_primary_plan(array $plans) {
    if (empty($plans)) {
        return null;
    }
    foreach ($plans as $plan) {
        if (!empty($plan['popular'])) {
            return $plan;
        }
    }
    return $plans[0];
}

function timex_format_money($amount, $currency = 'INR') {
    $amount = (float) $amount;
    if (strtoupper($currency) === 'INR') {
        return '₹' . timex_format_indian_number($amount);
    }
    return strtoupper($currency) . ' ' . number_format($amount, $amount == floor($amount) ? 0 : 2);
}

function timex_format_indian_number($amount) {
    $amount = (float) $amount;
    $isInt = abs($amount - round($amount)) < 0.001;
    $n = $isInt ? (string) (int) round($amount) : number_format($amount, 2, '.', '');
    $parts = explode('.', $n);
    $intPart = $parts[0];
    $dec = isset($parts[1]) ? '.' . $parts[1] : '';

    $len = strlen($intPart);
    if ($len <= 3) {
        return $intPart . $dec;
    }
    $last3 = substr($intPart, -3);
    $rest = substr($intPart, 0, -3);
    $rest = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $rest);
    return $rest . ',' . $last3 . $dec;
}

/**
 * Map static config fallback plans into the same shape as live plans.
 *
 * @param array $staticPlans
 * @return array<int, array>
 */
function timex_normalize_fallback_plans(array $staticPlans) {
    $out = [];
    foreach ($staticPlans as $i => $plan) {
        $monthlyRaw = isset($plan['monthly']) ? (string) $plan['monthly'] : '';
        $yearlyRaw = isset($plan['yearly']) ? (string) $plan['yearly'] : '';
        $hasPrice = $monthlyRaw !== '' || $yearlyRaw !== '';
        $featureList = array_values($plan['features'] ?? []);
        $featureGroups = [];
        if (!empty($plan['feature_groups']) && is_array($plan['feature_groups'])) {
            $featureGroups = $plan['feature_groups'];
        } elseif (!empty($featureList)) {
            $featureGroups[] = [
                'category' => 'Included',
                'icon' => 'fa-circle-check',
                'items' => array_map(function ($label) {
                    return [
                        'code' => '',
                        'name' => (string) $label,
                        'description' => '',
                    ];
                }, $featureList),
            ];
        }
        $out[] = [
            'code' => (string) ($plan['key'] ?? ('plan-' . $i)),
            'name' => (string) ($plan['name'] ?? 'Plan'),
            'blurb' => (string) ($plan['blurb'] ?? ''),
            'monthly' => 0,
            'yearly' => 0,
            'currency' => 'INR',
            'monthly_enabled' => $monthlyRaw !== '',
            'yearly_enabled' => $yearlyRaw !== '',
            'billing_cycle' => ($monthlyRaw !== '' && $yearlyRaw !== '') ? 'both' : ($yearlyRaw !== '' ? 'yearly' : ($monthlyRaw !== '' ? 'monthly' : '')),
            'monthly_label' => $hasPrice ? $monthlyRaw : '',
            'yearly_label' => $hasPrice ? $yearlyRaw : '',
            'popular' => !empty($plan['popular']),
            'is_quote' => !$hasPrice,
            'trial_days' => isset($plan['trial_days']) ? (int) $plan['trial_days'] : null,
            'trial_enabled' => !empty($plan['trial_enabled']),
            'sort_order' => $i,
            'features' => $featureList,
            'feature_groups' => $featureGroups,
            'limits' => array_values($plan['limits'] ?? []),
            'addons' => array_values($plan['addons'] ?? []),
            'offer' => null,
            'commitment_offers' => timex_select_commitment_offers(
                $plan['commitment_offers'] ?? [],
                'INR',
                timex_default_commitment_offers()
            ),
            'icon' => (string) ($plan['icon'] ?? 'blue'),
            'icon_fa' => (string) ($plan['icon_fa'] ?? 'fa-coins'),
            'note' => (string) ($plan['note'] ?? ''),
        ];
    }
    return $out;
}

/**
 * @return array{plans: array, fetched_at: int}|null
 */
function timex_read_plans_cache($cacheFile, $ttl) {
    $raw = @file_get_contents($cacheFile);
    if ($raw === false || $raw === '') {
        return null;
    }
    $data = json_decode($raw, true);
    if (!is_array($data) || empty($data['plans']) || !is_array($data['plans'])) {
        return null;
    }
    $fetchedAt = isset($data['fetched_at']) ? (int) $data['fetched_at'] : 0;
    if ($ttl < PHP_INT_MAX && ($fetchedAt + $ttl) < time()) {
        return null;
    }
    return [
        'plans' => $data['plans'],
        'fetched_at' => $fetchedAt,
    ];
}

function timex_write_plans_cache($cacheFile, array $plans) {
    $dir = dirname($cacheFile);
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    $payload = json_encode([
        'fetched_at' => time(),
        'plans' => $plans,
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($payload === false) {
        return;
    }
    @file_put_contents($cacheFile, $payload, LOCK_EX);
}

/**
 * Resolve plans for page/API: live/cache first, then static fallback.
 *
 * @return array{plans: array, source: string, live: bool}
 */
function timex_resolve_pricing_plans(array $fallbackStatic = []) {
    $result = timex_fetch_portal_plans();
    if ($result !== null && !empty($result['plans'])) {
        return [
            'plans' => $result['plans'],
            'source' => $result['source'],
            'live' => true,
        ];
    }

    $fallback = timex_normalize_fallback_plans($fallbackStatic);
    return [
        'plans' => $fallback,
        'source' => 'fallback',
        'live' => false,
    ];
}
