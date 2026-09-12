<?php
/**
 * Fetch and normalize Maz Payroll plans from the portal public catalog API.
 */

if (!defined('PAYROLL_PLANS_API_BASE')) {
    require_once __DIR__ . '/config.php';
}

/**
 * @return array{plans: array<int, array>, source: string}|null
 *         null only when neither live/cache nor usable data is available
 */
function payroll_fetch_portal_plans($forceRefresh = false) {
    $cacheFile = __DIR__ . '/../cache/plans.json';
    $ttl = defined('PAYROLL_PLANS_CACHE_TTL') ? (int) PAYROLL_PLANS_CACHE_TTL : 600;

    if (!$forceRefresh && is_file($cacheFile)) {
        $cached = payroll_read_plans_cache($cacheFile, $ttl);
        if ($cached !== null) {
            return [
                'plans' => $cached['plans'],
                'source' => 'cache',
            ];
        }
    }

    $live = payroll_request_portal_plans();
    if ($live !== null && !empty($live)) {
        payroll_write_plans_cache($cacheFile, $live);
        return [
            'plans' => $live,
            'source' => 'live',
        ];
    }

    // Stale cache is better than nothing when upstream is down
    if (is_file($cacheFile)) {
        $stale = payroll_read_plans_cache($cacheFile, PHP_INT_MAX);
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
function payroll_request_portal_plans() {
    $base = rtrim(PAYROLL_PLANS_API_BASE, '/');
    $url = $base . '/plans?status=active&product_code=payroll';
    $timeout = defined('PAYROLL_PLANS_TIMEOUT') ? (int) PAYROLL_PLANS_TIMEOUT : 5;

    $raw = payroll_http_get($url, $timeout);
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
        $normalized = payroll_normalize_portal_plan($row);
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
function payroll_http_get($url, $timeout = 5) {
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
                'User-Agent: MazPayrollMarketing/1.0',
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
                'header' => "Accept: application/json\r\nUser-Agent: MazPayrollMarketing/1.0\r\n",
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
    $curlBin = payroll_find_curl_binary();
    if ($curlBin !== null) {
        $tmpBody = tempnam(sys_get_temp_dir(), 'ppb');
        $tmpHdr = tempnam(sys_get_temp_dir(), 'pph');
        if ($tmpBody !== false && $tmpHdr !== false) {
            $cmd = escapeshellarg($curlBin)
                . ' -sS -L --max-time ' . (int) $timeout
                . ' -H ' . escapeshellarg('Accept: application/json')
                . ' -H ' . escapeshellarg('User-Agent: MazPayrollMarketing/1.0')
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
function payroll_find_curl_binary() {
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
function payroll_normalize_portal_plan(array $p) {
    $code = trim((string) ($p['plan_code'] ?? ''));
    $name = trim((string) ($p['plan_name'] ?? $p['name'] ?? $code));
    if ($code === '' && $name === '') {
        return null;
    }

    $monthly = isset($p['monthly_price']) ? (float) $p['monthly_price'] : 0.0;
    $yearly = isset($p['yearly_price']) ? (float) $p['yearly_price'] : 0.0;
    $currency = strtoupper(trim((string) ($p['currency'] ?? 'INR')));
    $isQuote = !empty($p['is_quote']);

    $features = [];
    if (!empty($p['display_labels']) && is_array($p['display_labels'])) {
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
        foreach (array_slice($p['included_features'], 0, 8) as $feat) {
            $features[] = is_string($feat) ? $feat : (string) $feat;
        }
    }

    $iconMap = [
        'basic' => ['teal', 'fa-seedling'],
        'starter' => ['teal', 'fa-seedling'],
        'standard' => ['navy', 'fa-briefcase'],
        'professional' => ['slate', 'fa-building'],
        'enterprise' => ['slate', 'fa-building'],
        'growth' => ['navy', 'fa-briefcase'],
        'business' => ['slate', 'fa-building'],
    ];
    $key = strtolower($code !== '' ? $code : $name);
    $icon = $iconMap[$key] ?? ['teal', 'fa-coins'];

    return [
        'code' => $code !== '' ? $code : $key,
        'name' => $name,
        'blurb' => trim((string) ($p['short_description'] ?? $p['description'] ?? '')),
        'monthly' => $monthly,
        'yearly' => $yearly,
        'currency' => $currency,
        'monthly_label' => $isQuote || $monthly <= 0 ? '' : payroll_format_money($monthly, $currency),
        'yearly_label' => $isQuote || $yearly <= 0 ? '' : payroll_format_money($yearly, $currency),
        'popular' => !empty($p['is_popular']),
        'is_quote' => $isQuote,
        'trial_days' => isset($p['trial_days']) ? (int) $p['trial_days'] : null,
        'trial_enabled' => !empty($p['trial_enabled']),
        'sort_order' => isset($p['sort_order']) ? (int) $p['sort_order'] : 0,
        'features' => $features,
        'icon' => $icon[0],
        'icon_fa' => $icon[1],
    ];
}

function payroll_format_money($amount, $currency = 'INR') {
    $amount = (float) $amount;
    if (strtoupper($currency) === 'INR') {
        return '₹' . payroll_format_indian_number($amount);
    }
    return strtoupper($currency) . ' ' . number_format($amount, $amount == floor($amount) ? 0 : 2);
}

function payroll_format_indian_number($amount) {
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
function payroll_normalize_fallback_plans(array $staticPlans) {
    $out = [];
    foreach ($staticPlans as $i => $plan) {
        $monthlyRaw = isset($plan['monthly']) ? (string) $plan['monthly'] : '';
        $yearlyRaw = isset($plan['yearly']) ? (string) $plan['yearly'] : '';
        $hasPrice = $monthlyRaw !== '' || $yearlyRaw !== '';
        $out[] = [
            'code' => (string) ($plan['key'] ?? ('plan-' . $i)),
            'name' => (string) ($plan['name'] ?? 'Plan'),
            'blurb' => (string) ($plan['blurb'] ?? ''),
            'monthly' => 0,
            'yearly' => 0,
            'currency' => 'INR',
            'monthly_label' => $hasPrice ? $monthlyRaw : '',
            'yearly_label' => $hasPrice ? $yearlyRaw : '',
            'popular' => !empty($plan['popular']),
            'is_quote' => !$hasPrice,
            'trial_days' => null,
            'trial_enabled' => false,
            'sort_order' => $i,
            'features' => array_values($plan['features'] ?? []),
            'icon' => (string) ($plan['icon'] ?? 'teal'),
            'icon_fa' => (string) ($plan['icon_fa'] ?? 'fa-coins'),
            'note' => (string) ($plan['note'] ?? ''),
        ];
    }
    return $out;
}

/**
 * @return array{plans: array, fetched_at: int}|null
 */
function payroll_read_plans_cache($cacheFile, $ttl) {
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

function payroll_write_plans_cache($cacheFile, array $plans) {
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
function payroll_resolve_pricing_plans(array $fallbackStatic = []) {
    $result = payroll_fetch_portal_plans();
    if ($result !== null && !empty($result['plans'])) {
        return [
            'plans' => $result['plans'],
            'source' => $result['source'],
            'live' => true,
        ];
    }

    $fallback = payroll_normalize_fallback_plans($fallbackStatic);
    return [
        'plans' => $fallback,
        'source' => 'fallback',
        'live' => false,
    ];
}
