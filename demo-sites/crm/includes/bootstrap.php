<?php

declare(strict_types=1);

$config = require dirname(__DIR__) . '/config.php';
require_once __DIR__ . '/url-routes.php';
require_once __DIR__ . '/marketing-icon.php';
require_once __DIR__ . '/themes.php';

function site_config(): array
{
    global $config;
    return $config;
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function format_inr(int|float $amount): string
{
    return '₹' . number_format((float) $amount, 0, '.', ',');
}

function login_url(): string
{
    $c = site_config();
    $return = $c['crm_app_url'] . '/';
    return $c['console_url'] . '/auth/login?returnUrl=' . rawurlencode($return);
}

function get_started_url(): string
{
    $c = site_config();
    return $c['crm_app_url'] . '/initialize';
}

function logo_url(): string
{
    $c = site_config();
    return asset_url((string) ($c['logo'] ?? 'assets/img/logo-crm.png'));
}

/** Absolute or root-relative href for suite marketing URLs. */
function suite_product_href(string $url): string
{
    $url = trim($url);
    if ($url === '') {
        $url = '/';
    }
    if (preg_match('#^https?://#i', $url)) {
        return $url;
    }

    $path = str_starts_with($url, '/') ? $url : '/' . $url;
    if (!str_ends_with($path, '/')) {
        $path .= '/';
    }

    $origin = site_url();
    if ($origin === '') {
        return $path;
    }

    $parts = parse_url($origin);
    if ($parts === false || empty($parts['host'])) {
        return $path;
    }

    $scheme = $parts['scheme'] ?? 'https';
    $port = isset($parts['port']) ? ':' . $parts['port'] : '';

    return $scheme . '://' . $parts['host'] . $port . $path;
}

/**
 * @return list<array<string, mixed>>
 */
function suite_products_for_nav(): array
{
    $c = site_config();
    $items = $c['suite_products'] ?? [];
    $resolved = [];
    foreach ($items as $item) {
        $id = (string) ($item['id'] ?? strtolower((string) $item['label']));
        $resolved[] = array_merge($item, [
            'id' => $id,
            'url' => suite_product_href((string) $item['url']),
        ]);
    }

    array_unshift($resolved, [
        'id' => 'crm',
        'label' => 'Maz CRM',
        'description' => 'Leads, pipeline, follow-ups & reports',
        'url' => suite_product_href(route_url('')),
        'icon' => 'crm',
        'current' => true,
    ]);

    return $resolved;
}

function base_path(): string
{
    static $resolved = null;
    if ($resolved !== null) {
        return $resolved;
    }

    $env = getenv('MAZERP_BASE_PATH');
    if ($env !== false) {
        $resolved = ($env === '' || $env === '0') ? '' : '/' . trim($env, '/');
        return $resolved;
    }

    $cfg = site_config()['base_path'] ?? 'crm';
    if ($cfg === '' || $cfg === false || $cfg === null) {
        $resolved = '';
        return $resolved;
    }

    $configured = '/' . trim((string) $cfg, '/');
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $uriPath = rawurldecode($uriPath);

    $underProductPrefix = $script === $configured
        || str_starts_with($script, $configured . '/')
        || $uriPath === $configured
        || str_starts_with($uriPath, $configured . '/');

    if ($script !== '' && !$underProductPrefix) {
        $resolved = '';
        return $resolved;
    }

    $resolved = $configured;
    return $resolved;
}

function route_url(string $path = ''): string
{
    $bp = base_path();
    $pretty = internal_path_to_pretty($path);
    if ($pretty === '') {
        return $bp === '' ? '/' : $bp . '/';
    }
    $url = ($bp === '' ? '' : $bp) . '/' . $pretty;
    return $url;
}

function route_home(): string
{
    return route_url('');
}

function asset_url(string $path): string
{
    $bp = base_path();
    $prefix = $bp === '' ? '' : $bp;
    return $prefix . '/' . ltrim($path, '/');
}

function is_current_page(string $filename): bool
{
    return basename($_SERVER['SCRIPT_NAME'] ?? '') === $filename;
}

function site_url(): string
{
    $configured = site_config()['seo']['site_url'] ?? '';
    if ($configured !== '') {
        return rtrim($configured, '/');
    }
    if (PHP_SAPI === 'cli-server' || isset($_SERVER['HTTP_HOST'])) {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $bp = base_path();
        if ($bp !== '') {
            return $scheme . '://' . $host . $bp;
        }
        $dir = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
        if ($dir === '' || $dir === '.') {
            return $scheme . '://' . $host;
        }
        return $scheme . '://' . $host . $dir;
    }
    return '';
}

function absolute_url(string $path = ''): string
{
    $path = trim($path, '/');
    if ($path === 'index.php') {
        $path = '';
    }
    $pretty = $path === '' ? '' : internal_path_to_pretty($path);
    $origin = site_url();
    if ($pretty === '') {
        return $origin === '' ? '/' : rtrim($origin, '/') . '/';
    }
    if ($origin === '') {
        return route_url($path);
    }
    return rtrim($origin, '/') . '/' . $pretty;
}

function seo_meta_description(string $text, int $max = 160): string
{
    $text = trim(preg_replace('/\s+/', ' ', $text) ?? '');
    if (strlen($text) <= $max) {
        return $text;
    }
    $cut = substr($text, 0, $max - 1);
    $lastSpace = strrpos($cut, ' ');
    if ($lastSpace !== false && $lastSpace > (int) ($max * 0.6)) {
        $cut = substr($cut, 0, $lastSpace);
    }
    return rtrim($cut, '.,;—') . '…';
}

/** @param array<string, mixed> $data */
function json_ld_script(array $data): string
{
    return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

/**
 * @return list<array{id: string, label: string, url: string}>
 */
function social_links(): array
{
    $c = site_config();
    $candidates = [
        'facebook' => ['label' => 'Facebook', 'url' => (string) ($c['social_facebook'] ?? '')],
        'instagram' => ['label' => 'Instagram', 'url' => (string) ($c['social_instagram'] ?? '')],
        'linkedin' => ['label' => 'LinkedIn', 'url' => (string) ($c['social_linkedin'] ?? '')],
        'twitter' => ['label' => 'X (Twitter)', 'url' => (string) ($c['social_twitter'] ?? '')],
    ];

    $links = [];
    foreach ($candidates as $id => $item) {
        $url = trim($item['url']);
        if ($url === '') {
            continue;
        }
        $links[] = [
            'id' => $id,
            'label' => $item['label'],
            'url' => $url,
        ];
    }

    return $links;
}
