<?php
/**
 * Public catalog from mazerp-nx: GET /portal/catalog/app-pricing
 */

function mazerp_catalog_fallback() {
    $prices = [
        ['plan_id' => 2, 'plan_code' => 'basic', 'plan_name' => 'Basic', 'short_description' => 'Start with the essentials', 'sort_order' => 2, 'is_popular' => false, 'monthly_price' => 90, 'yearly_price' => 990, 'currency' => 'INR', 'is_free' => false],
        ['plan_id' => 3, 'plan_code' => 'standard', 'plan_name' => 'Standard', 'short_description' => 'Room to grow a branch', 'sort_order' => 3, 'is_popular' => false, 'monthly_price' => 299, 'yearly_price' => 3299, 'currency' => 'INR', 'is_free' => false],
        ['plan_id' => 6, 'plan_code' => 'professional', 'plan_name' => 'Professional', 'short_description' => 'Automation for busy teams', 'sort_order' => 4, 'is_popular' => false, 'monthly_price' => 599, 'yearly_price' => 6599, 'currency' => 'INR', 'is_free' => false],
        ['plan_id' => 4, 'plan_code' => 'premium', 'plan_name' => 'Premium', 'short_description' => 'Highest limits on each app', 'sort_order' => 5, 'is_popular' => true, 'monthly_price' => 999, 'yearly_price' => 10989, 'currency' => 'INR', 'is_free' => false],
    ];
    $apps = [];
    foreach (['books' => 'Books', 'crm' => 'CRM', 'timex' => 'Timex'] as $code => $name) {
        $apps[] = [
            'id' => 0,
            'app_code' => $code,
            'app_name' => $name,
            'short_description' => '',
            'sort_order' => 0,
            'is_global' => false,
            'prices' => $prices,
        ];
    }
    return ['currency' => 'INR', 'apps' => $apps, 'included' => []];
}

function mazerp_fetch_app_pricing_catalog() {
    $url = rtrim(MAZERP_API_BASE, '/') . '/portal/catalog/app-pricing';
    $ctx = stream_context_create([
        'http' => [
            'method'  => 'GET',
            'timeout' => 4,
            'header'  => "Accept: application/json\r\n",
            'ignore_errors' => true,
        ],
    ]);
    $raw = @file_get_contents($url, false, $ctx);
    if ($raw === false) {
        return mazerp_catalog_fallback();
    }
    $json = json_decode($raw, true);
    $data = is_array($json) ? ($json['data'] ?? null) : null;
    if (!is_array($data) || empty($data['apps'])) {
        return mazerp_catalog_fallback();
    }
    return $data;
}

function mazerp_catalog_price_map($prices) {
    $map = [];
    foreach ($prices as $row) {
        $id = (int) ($row['plan_id'] ?? 0);
        if (!$id) {
            continue;
        }
        $map[$id] = [
            'monthly' => (float) ($row['monthly_price'] ?? 0),
            'yearly'  => (float) ($row['yearly_price'] ?? 0),
        ];
    }
    return $map;
}

function mazerp_catalog_lowest_monthly($prices) {
    $vals = [];
    foreach ($prices as $row) {
        if (!empty($row['is_free'])) {
            continue;
        }
        $vals[] = (float) ($row['monthly_price'] ?? 0);
    }
    return $vals ? min($vals) : 0;
}

function mazerp_fetch_catalog_compare($planIds, $appCodes = '') {
    $ids = preg_replace('/[^0-9,]/', '', (string) $planIds);
    $codes = preg_replace('/[^a-z0-9_,]/', '', strtolower((string) $appCodes));
    $url = rtrim(MAZERP_API_BASE, '/') . '/portal/catalog/compare?plan_ids=' . rawurlencode($ids);
    if ($codes !== '') {
        $url .= '&app_codes=' . rawurlencode($codes);
    }
    $ctx = stream_context_create([
        'http' => [
            'method'  => 'GET',
            'timeout' => 6,
            'header'  => "Accept: application/json\r\n",
            'ignore_errors' => true,
        ],
    ]);
    $raw = @file_get_contents($url, false, $ctx);
    $json = is_string($raw) ? json_decode($raw, true) : null;
    if (!is_array($json)) {
        return [
            'ok' => false,
            'body' => [
                'statusCode' => 502,
                'message' => 'Compare is unavailable right now.',
            ],
        ];
    }
    $code = (int) ($json['statusCode'] ?? 200);
    return ['ok' => $code >= 200 && $code < 300, 'body' => $json];
}
