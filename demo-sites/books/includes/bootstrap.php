<?php

declare(strict_types=1);

$config = require dirname(__DIR__) . '/config.php';
require_once __DIR__ . '/url-routes.php';
require_once __DIR__ . '/marketing-icon.php';
require_once __DIR__ . '/themes.php';
require_once __DIR__ . '/pricing-plans-service.php';

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
    $return = $c['books_app_url'] . '/';
    return $c['console_url'] . '/auth/login?returnUrl=' . rawurlencode($return);
}

function get_started_url(): string
{
    $c = site_config();
    return $c['books_app_url'] . '/initialize';
}

/** Console Books pricing (official plan catalog). */
function books_console_pricing_url(?string $planCode = null, ?string $billing = null): string
{
    $base = rtrim(site_config()['console_url'], '/') . '/books/pricing';
    $params = [];
    if ($planCode !== null && $planCode !== '') {
        $params['plan_code'] = $planCode;
    }
    if ($billing === 'monthly' || $billing === 'yearly') {
        $params['billing'] = $billing;
    }
    if ($params === []) {
        return $base;
    }

    return $base . '?' . http_build_query($params);
}

function books_console_addons_url(): string
{
    return rtrim(site_config()['console_url'], '/') . '/books/addons';
}

/** @param array<string, mixed> $plan */
function pricing_plan_cta_url(array $plan, string $billingMode = 'yearly'): string
{
    if (!empty($plan['is_quote'])) {
        return section_url('contact');
    }
    $planCode = isset($plan['plan_code']) ? (string) $plan['plan_code'] : '';
    if ($planCode !== '') {
        return books_console_pricing_url($planCode, $billingMode);
    }

    return books_console_pricing_url();
}

/** @return array<string, mixed> */
function pricing_catalog(): array
{
    return pricing_catalog_result();
}

/** @return list<array<string, mixed>> */
function pricing_plans(): array
{
    $catalog = pricing_catalog_result();
    if ($catalog['state'] === 'ok') {
        return is_array($catalog['plans']) ? $catalog['plans'] : [];
    }
    if ($catalog['state'] === 'disabled') {
        return pricing_config_plans();
    }

    return [];
}

function pricing_has_numeric_amounts(): bool
{
    foreach (pricing_plans() as $plan) {
        $monthly = $plan['monthly_price'] ?? null;
        $yearly = $plan['yearly_price'] ?? null;
        if ($monthly !== null && $monthly !== '' && (int) $monthly > 0) {
            return true;
        }
        if ($yearly !== null && $yearly !== '' && (int) $yearly > 0) {
            return true;
        }
    }

    return false;
}

function pricing_show_billing_toggle(): bool
{
    $catalog = pricing_catalog_result();
    if ($catalog['state'] === 'ok') {
        $hasMonthly = false;
        $hasYearly = false;
        foreach (pricing_plans() as $plan) {
            if (!empty($plan['monthly_enabled']) && ($plan['monthly_price'] ?? null) !== null) {
                $hasMonthly = true;
            }
            if (!empty($plan['yearly_enabled']) && ($plan['yearly_price'] ?? null) !== null) {
                $hasYearly = true;
            }
        }

        return $hasMonthly && $hasYearly;
    }

    $pricing = site_config()['pricing'] ?? [];
    if (array_key_exists('show_billing_toggle', $pricing)) {
        return (bool) $pricing['show_billing_toggle'];
    }

    return pricing_has_numeric_amounts();
}

/**
 * Web path prefix when the site is served under a subdirectory (e.g. /books).
 * Auto-clears if the app runs at the vhost document root (e.g. php -S -t books).
 */
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

    $cfg = site_config()['base_path'] ?? 'books';
    if ($cfg === '' || $cfg === false || $cfg === null) {
        $resolved = '';
        return $resolved;
    }

    $configured = '/' . trim((string) $cfg, '/');
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    if ($script !== '' && !str_starts_with($script, $configured . '/') && $script !== $configured) {
        $resolved = '';
        return $resolved;
    }

    $resolved = $configured;
    return $resolved;
}

/** @deprecated Use route_url() */
function site_root_prefix(): string
{
    $bp = base_path();
    if ($bp === '') {
        $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        return str_contains($script, '/guides/') ? '../' : '';
    }
    return $bp . '/';
}

/** Pretty URL path (pass internal script path like guides/foo.php or empty for home). */
function route_url(string $path = ''): string
{
    $bp = base_path();
    $pretty = internal_path_to_pretty($path);
    if ($pretty === '') {
        $url = $bp === '' ? '/' : $bp . '/';
        return with_theme_query($url);
    }
    $url = ($bp === '' ? '' : $bp) . '/' . $pretty;
    return with_theme_query($url);
}

/** Home URL for anchors */
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
