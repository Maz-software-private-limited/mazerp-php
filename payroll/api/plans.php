<?php
/**
 * GET /payroll/api/plans.php
 * Proxies active payroll plans from the portal public catalog.
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/plans-api.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=300');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed.',
        'product_code' => 'payroll',
        'plans' => [],
    ]);
    exit;
}

$resolved = payroll_resolve_pricing_plans($payroll_plans ?? []);

echo json_encode([
    'success' => true,
    'source' => $resolved['source'],
    'product_code' => 'payroll',
    'plans' => $resolved['plans'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
