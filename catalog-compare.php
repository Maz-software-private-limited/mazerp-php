<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/catalog-pricing.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$planIds = isset($_GET['plan_ids']) ? (string) $_GET['plan_ids'] : '';
$appCodes = isset($_GET['app_codes']) ? (string) $_GET['app_codes'] : '';
$payload = mazerp_fetch_catalog_compare($planIds, $appCodes);
http_response_code(!empty($payload['ok']) ? 200 : 400);
echo json_encode($payload['body'], JSON_UNESCAPED_UNICODE);
