<?php

declare(strict_types=1);

/**
 * CLI smoke test for live pricing fetch. Usage:
 *   php scripts/test-pricing-api.php
 *   MAZERP_CONSOLE_API_URL=https://staging-api.mazerp.com/console php scripts/test-pricing-api.php
 */

require dirname(__DIR__) . '/includes/bootstrap.php';

$catalog = pricing_catalog();
echo json_encode([
    'state' => $catalog['state'] ?? null,
    'http_status' => $catalog['http_status'] ?? null,
    'api_url' => $catalog['api_url'] ?? pricing_api_request_url(),
    'plan_count' => is_array($catalog['plans'] ?? null) ? count($catalog['plans']) : 0,
    'plan_codes' => array_map(
        static fn (array $p): string => (string) ($p['plan_code'] ?? ''),
        is_array($catalog['plans'] ?? null) ? $catalog['plans'] : []
    ),
    'from_cache' => $catalog['from_cache'] ?? false,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
