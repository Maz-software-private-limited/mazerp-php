<?php

declare(strict_types=1);

/**
 * Live Books plan catalog from MazERP console API (see PlanApi in mazerp-nx saas-angular).
 *
 * GET {console_api_base}/{product_code}/plans?status=active
 */

/** @return array<string, mixed> */
function pricing_api_config(): array
{
    $pricing = site_config()['pricing'] ?? [];
    $api = is_array($pricing['api'] ?? null) ? $pricing['api'] : [];

    $base = getenv('MAZERP_CONSOLE_API_URL');
    if ($base === false || $base === '') {
        $base = (string) ($api['base_url'] ?? 'https://api.mazerp.com/console');
    }

    $product = getenv('MAZERP_BOOKS_PRODUCT_CODE');
    if ($product === false || $product === '') {
        $product = (string) ($api['product_code'] ?? 'books');
    }

    $enabledEnv = getenv('MAZERP_BOOKS_LIVE_PRICING');
    $enabled = $enabledEnv === false
        ? (bool) ($api['enabled'] ?? true)
        : !in_array(strtolower((string) $enabledEnv), ['0', 'false', 'off', 'no'], true);

    return [
        'enabled' => $enabled,
        'base_url' => rtrim($base, '/'),
        'product_code' => strtolower(trim($product)),
        'query' => is_array($api['query'] ?? null) ? $api['query'] : ['status' => 'active'],
        'connect_timeout' => max(1, (int) ($api['connect_timeout'] ?? 5)),
        'timeout' => max(2, (int) ($api['timeout'] ?? 15)),
        'cache_ttl' => max(0, (int) ($api['cache_ttl'] ?? 300)),
        'use_stale_on_error' => (bool) ($api['use_stale_on_error'] ?? true),
    ];
}

function pricing_api_request_url(): string
{
    $cfg = pricing_api_config();
    $path = rawurlencode($cfg['product_code']) . '/plans';
    $url = $cfg['base_url'] . '/' . $path;
    $query = $cfg['query'];
    if ($query !== []) {
        $url .= '?' . http_build_query($query);
    }

    return $url;
}

function pricing_cache_file_path(): string
{
    return dirname(__DIR__) . '/storage/pricing-plans.cache.json';
}

/** @return array{payload: array<string, mixed>|null, fetched_at: int}|null */
function pricing_read_cache(): ?array
{
    $path = pricing_cache_file_path();
    if (!is_readable($path)) {
        return null;
    }
    $raw = file_get_contents($path);
    if ($raw === false || $raw === '') {
        return null;
    }
    $decoded = json_decode($raw, true);
    if (!is_array($decoded) || !isset($decoded['fetched_at'], $decoded['payload'])) {
        return null;
    }

    return [
        'fetched_at' => (int) $decoded['fetched_at'],
        'payload' => is_array($decoded['payload']) ? $decoded['payload'] : null,
    ];
}

/** @param array<string, mixed> $payload */
function pricing_write_cache(array $payload): void
{
    $dir = dirname(pricing_cache_file_path());
    if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
        return;
    }
    $body = json_encode([
        'fetched_at' => time(),
        'payload' => $payload,
    ], JSON_UNESCAPED_SLASHES);
    if ($body !== false) {
        file_put_contents(pricing_cache_file_path(), $body, LOCK_EX);
    }
}

/**
 * @return array{ok: bool, http_status: int, body: string, error: string}
 */
function pricing_http_get_curl_binary(string $url, int $connectTimeout, int $timeout): array
{
    $binary = PHP_OS_FAMILY === 'Windows' ? 'curl.exe' : 'curl';
    $cmd = [$binary, '-sS', '-H', 'Accept: application/json', '-w', '__HTTP_CODE__%{http_code}', '--connect-timeout', (string) $connectTimeout, '--max-time', (string) $timeout, $url];
    $descriptor = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
    $proc = @proc_open($cmd, $descriptor, $pipes, null, null, ['bypass_shell' => true]);
    if (!is_resource($proc)) {
        return ['ok' => false, 'http_status' => 0, 'body' => '', 'error' => 'curl binary unavailable'];
    }
    fclose($pipes[0]);
    $stdout = stream_get_contents($pipes[1]);
    $stderr = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    $exit = proc_close($proc);
    if ($stdout === false || $stdout === '') {
        return ['ok' => false, 'http_status' => 0, 'body' => '', 'error' => trim((string) $stderr) ?: 'empty response'];
    }
    $marker = '__HTTP_CODE__';
    $pos = strrpos($stdout, $marker);
    if ($pos === false) {
        return ['ok' => false, 'http_status' => 0, 'body' => '', 'error' => 'malformed curl output'];
    }
    $body = substr($stdout, 0, $pos);
    $httpStatus = (int) substr($stdout, $pos + strlen($marker));
    if ($exit !== 0 && $httpStatus === 0) {
        return ['ok' => false, 'http_status' => 0, 'body' => $body, 'error' => trim((string) $stderr) ?: 'curl exit ' . $exit];
    }

    return [
        'ok' => $httpStatus >= 200 && $httpStatus < 300,
        'http_status' => $httpStatus,
        'body' => $body,
        'error' => '',
    ];
}

/**
 * @return array{ok: bool, http_status: int, body: string, error: string}
 */
function pricing_http_get(string $url, int $connectTimeout, int $timeout): array
{
    if (!function_exists('curl_init')) {
        $binary = pricing_http_get_curl_binary($url, $connectTimeout, $timeout);
        if ($binary['http_status'] > 0 || $binary['body'] !== '' || $binary['error'] !== 'curl binary unavailable') {
            return $binary;
        }
    }

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        if ($ch === false) {
            return ['ok' => false, 'http_status' => 0, 'body' => '', 'error' => 'curl_init failed'];
        }
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => $connectTimeout,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'User-Agent: MazERP-Books-Marketing/1.0',
            ],
        ]);
        $body = curl_exec($ch);
        $httpStatus = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if ($body === false) {
            return ['ok' => false, 'http_status' => $httpStatus, 'body' => '', 'error' => $err !== '' ? $err : 'Request failed'];
        }

        return ['ok' => $httpStatus >= 200 && $httpStatus < 300, 'http_status' => $httpStatus, 'body' => (string) $body, 'error' => ''];
    }

    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => $timeout,
            'header' => "Accept: application/json\r\nUser-Agent: MazERP-Books-Marketing/1.0\r\n",
        ],
    ]);
    $body = @file_get_contents($url, false, $context);
    $httpStatus = 0;
    if (isset($http_response_header[0]) && preg_match('/\d{3}/', $http_response_header[0], $m)) {
        $httpStatus = (int) $m[0];
    }
    if ($body === false) {
        $binary = pricing_http_get_curl_binary($url, $connectTimeout, $timeout);
        if ($binary['http_status'] > 0 || $binary['body'] !== '') {
            return $binary;
        }

        return ['ok' => false, 'http_status' => $httpStatus, 'body' => '', 'error' => 'HTTP request failed (enable php curl/openssl or install curl)'];
    }

    return ['ok' => $httpStatus >= 200 && $httpStatus < 300, 'http_status' => $httpStatus, 'body' => $body, 'error' => ''];
}

/** @param array<string, mixed> $row */
function pricing_map_api_plan(array $row): ?array
{
    $planCode = trim((string) ($row['plan_code'] ?? ''));
    if ($planCode === '') {
        return null;
    }
    $status = strtolower((string) ($row['status'] ?? 'active'));
    if ($status !== '' && $status !== 'active') {
        return null;
    }

    $monthly = isset($row['monthly_price']) ? (float) $row['monthly_price'] : 0.0;
    $yearly = isset($row['yearly_price']) ? (float) $row['yearly_price'] : 0.0;
    $monthlyEnabled = array_key_exists('monthly_enabled', $row)
        ? (bool) $row['monthly_enabled']
        : $monthly > 0;
    $yearlyEnabled = array_key_exists('yearly_enabled', $row)
        ? (bool) $row['yearly_enabled']
        : $yearly > 0;

    $features = [];
    $labels = $row['display_labels'] ?? [];
    if (is_array($labels)) {
        usort($labels, static function ($a, $b): int {
            $sa = is_array($a) ? (int) ($a['sort_order'] ?? 0) : 0;
            $sb = is_array($b) ? (int) ($b['sort_order'] ?? 0) : 0;
            return $sa <=> $sb;
        });
        foreach ($labels as $labelRow) {
            if (!is_array($labelRow)) {
                continue;
            }
            $text = trim((string) ($labelRow['label'] ?? ''));
            if ($text !== '') {
                $features[] = $text;
            }
        }
    }

    $short = trim((string) ($row['short_description'] ?? ''));
    $desc = trim((string) ($row['description'] ?? ''));
    $description = $short !== '' ? $short : $desc;

    $currency = strtoupper(trim((string) ($row['currency'] ?? 'INR')));
    $isQuote = (bool) ($row['is_quote'] ?? false);

    return [
        'id' => $planCode,
        'plan_code' => $planCode,
        'name' => trim((string) ($row['plan_name'] ?? $row['name'] ?? $planCode)),
        'description' => $description,
        'monthly_price' => ($monthlyEnabled && $monthly > 0) ? (int) round($monthly) : null,
        'yearly_price' => ($yearlyEnabled && $yearly > 0) ? (int) round($yearly) : null,
        'monthly_enabled' => $monthlyEnabled,
        'yearly_enabled' => $yearlyEnabled,
        'currency' => $currency,
        'price_label' => 'View pricing details',
        'is_quote' => $isQuote,
        'highlighted' => (bool) ($row['is_popular'] ?? $row['is_featured'] ?? false),
        'sort_order' => (int) ($row['sort_order'] ?? 0),
        'features' => $features,
        'cta_label' => $isQuote ? 'Contact us' : 'Choose plan',
        'limit_note' => '',
        'trial_enabled' => (bool) ($row['trial_enabled'] ?? false),
        'trial_days' => isset($row['trial_days']) ? (int) $row['trial_days'] : null,
    ];
}

/** @param array<string, mixed> $payload */
function pricing_plans_from_api_payload(array $payload): array
{
    $list = $payload['data'] ?? null;
    if (!is_array($list)) {
        return [];
    }
    $plans = [];
    foreach ($list as $row) {
        if (!is_array($row)) {
            continue;
        }
        $mapped = pricing_map_api_plan($row);
        if ($mapped !== null) {
            $plans[] = $mapped;
        }
    }
    usort($plans, static fn (array $a, array $b): int => ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0));

    return $plans;
}

/** @return array<string, mixed> */
function pricing_fetch_live_payload(): array
{
    $cfg = pricing_api_config();
    $url = pricing_api_request_url();
    $response = pricing_http_get($url, $cfg['connect_timeout'], $cfg['timeout']);

    if (!$response['ok']) {
        error_log(sprintf(
            '[books-pricing] API request failed url=%s http=%d error=%s',
            $url,
            $response['http_status'],
            $response['error'] !== '' ? $response['error'] : 'non-2xx'
        ));

        return [
            'state' => 'error',
            'plans' => [],
            'message' => 'We could not load current plans from MazERP right now.',
            'http_status' => $response['http_status'],
            'fetched_at' => null,
            'from_cache' => false,
            'api_url' => $url,
        ];
    }

    $decoded = json_decode($response['body'], true);
    if (!is_array($decoded)) {
        error_log('[books-pricing] Invalid JSON from plans API');

        return [
            'state' => 'error',
            'plans' => [],
            'message' => 'Pricing data from MazERP was not in the expected format.',
            'http_status' => $response['http_status'],
            'fetched_at' => null,
            'from_cache' => false,
            'api_url' => $url,
        ];
    }

    pricing_write_cache($decoded);
    $plans = pricing_plans_from_api_payload($decoded);
    if ($plans === []) {
        return [
            'state' => 'empty',
            'plans' => [],
            'message' => 'Pricing plans are currently unavailable.',
            'http_status' => $response['http_status'],
            'fetched_at' => time(),
            'from_cache' => false,
            'api_url' => $url,
        ];
    }

    return [
        'state' => 'ok',
        'plans' => $plans,
        'message' => '',
        'http_status' => $response['http_status'],
        'fetched_at' => time(),
        'from_cache' => false,
        'api_url' => $url,
    ];
}

/** @return array<string, mixed> */
function pricing_catalog_result(): array
{
    $cfg = pricing_api_config();
    if (!$cfg['enabled']) {
        return [
            'state' => 'disabled',
            'plans' => pricing_config_plans(),
            'message' => '',
            'http_status' => null,
            'fetched_at' => null,
            'from_cache' => false,
            'api_url' => pricing_api_request_url(),
        ];
    }

    $cache = pricing_read_cache();
    $now = time();
    if ($cache !== null && $cfg['cache_ttl'] > 0 && ($now - $cache['fetched_at']) <= $cfg['cache_ttl']) {
        $payload = $cache['payload'];
        if (is_array($payload)) {
            $plans = pricing_plans_from_api_payload($payload);
            if ($plans !== []) {
                return [
                    'state' => 'ok',
                    'plans' => $plans,
                    'message' => '',
                    'http_status' => 200,
                    'fetched_at' => $cache['fetched_at'],
                    'from_cache' => true,
                    'api_url' => pricing_api_request_url(),
                ];
            }
        }
    }

    $live = pricing_fetch_live_payload();
    if ($live['state'] === 'ok') {
        return $live;
    }

    if ($cfg['use_stale_on_error'] && $cache !== null && is_array($cache['payload'])) {
        $stalePlans = pricing_plans_from_api_payload($cache['payload']);
        if ($stalePlans !== []) {
            error_log('[books-pricing] Serving stale cached plans after API failure');

            return [
                'state' => 'ok',
                'plans' => $stalePlans,
                'message' => '',
                'http_status' => $live['http_status'],
                'fetched_at' => $cache['fetched_at'],
                'from_cache' => true,
                'stale' => true,
                'api_url' => $live['api_url'] ?? pricing_api_request_url(),
            ];
        }
    }

    return $live;
}

/** @return list<array<string, mixed>> */
function pricing_config_plans(): array
{
    $pricing = site_config()['pricing'] ?? [];
    $plans = $pricing['plans'] ?? null;
    if (is_array($plans) && $plans !== []) {
        return $plans;
    }
    if (isset($pricing['plan']) && is_array($pricing['plan'])) {
        return [$pricing['plan']];
    }

    return [];
}

function format_plan_money(int|float $amount, string $currency = 'INR'): string
{
    $currency = strtoupper($currency);
    if ($currency === 'INR') {
        return format_inr((int) round((float) $amount));
    }

    return $currency . ' ' . number_format((float) $amount, 0, '.', ',');
}
