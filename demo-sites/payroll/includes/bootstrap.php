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

function site_logo_path(): string
{
    $path = (string) (site_config()['logo'] ?? 'assets/img/logo.png');
    return $path !== '' ? $path : 'assets/img/logo.png';
}

function site_logo_url(): string
{
    return asset_url(site_logo_path());
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function format_inr(int|float $amount): string
{
    return '₹' . number_format((float) $amount, 0, '.', ',');
}

/** @return array<string, mixed> */
function pricing_plan(): array
{
    $pricing = site_config()['pricing'] ?? [];
    if (isset($pricing['plan']) && is_array($pricing['plan'])) {
        return $pricing['plan'];
    }

    return [
        'name' => 'MazERP Payroll',
        'description' => 'One plan for monthly payroll runs, statutory components, attendance, leave, and payslips.',
        'monthly_price' => (int) (getenv('MAZERP_PRICE_MONTHLY') ?: 999),
        'included_employees' => (int) (getenv('MAZERP_INCLUDED_EMPLOYEES') ?: 10),
        'addon_employee_monthly' => (int) (getenv('MAZERP_PRICE_ADDON_EMPLOYEE') ?: 99),
        'yearly_price' => (int) (getenv('MAZERP_PRICE_YEARLY') ?: 0),
        'employee_limit' => '10 employees included — add more anytime',
        'features' => [
            'Monthly payroll processing and registers',
            'Salary structures, attendance, leave & LOP',
            'PF, ESI, and TDS in your workflow',
            'Payslips after payroll approval',
        ],
        'cta' => 'Open payroll app',
        'offers' => [
            ['id' => 'intro_3mo', 'label' => 'First 3 months', 'months' => 3, 'billing' => 'monthly', 'monthly_price' => (int) (getenv('MAZERP_PRICE_INTRO_3MO') ?: 3999)],
            ['id' => 'intro_6mo', 'label' => 'First 6 months', 'months' => 6, 'billing' => 'monthly', 'monthly_price' => (int) (getenv('MAZERP_PRICE_INTRO_6MO') ?: 4499)],
        ],
        'intro_note' => 'Offer prices are for new customers. Standard rates apply after the offer period.',
    ];
}

/** @return list<array<string, mixed>> */
function pricing_offers(): array
{
    $plan = pricing_plan();
    $raw = $plan['offers'] ?? $plan['intro_offers'] ?? [];
    if (!is_array($raw)) {
        return [];
    }

    $normalized = [];
    foreach ($raw as $offer) {
        if (!is_array($offer)) {
            continue;
        }
        $billing = (string) ($offer['billing'] ?? 'monthly');
        if ($billing !== 'yearly') {
            $billing = 'monthly';
        }
        $normalized[] = [
            'id' => (string) ($offer['id'] ?? ''),
            'label' => (string) ($offer['label'] ?? ''),
            'months' => isset($offer['months']) ? (int) $offer['months'] : null,
            'monthly_price' => isset($offer['monthly_price']) ? (int) $offer['monthly_price'] : null,
            'yearly_price' => isset($offer['yearly_price']) ? (int) $offer['yearly_price'] : null,
            'billing' => $billing,
            'badge' => (string) ($offer['badge'] ?? ''),
        ];
    }

    return $normalized;
}

function login_url(): string
{
    $c = site_config();
    $return = $c['payroll_app_url'] . '/';
    return $c['console_url'] . '/auth/login?returnUrl=' . rawurlencode($return);
}

function get_started_url(): string
{
    $c = site_config();
    return $c['payroll_app_url'] . '/initialize';
}

function mazerp_marketing_url(): string
{
    $url = (string) (site_config()['mazerp_marketing_url'] ?? 'https://www.mazerp.com');
    return rtrim($url !== '' ? $url : 'https://www.mazerp.com', '/');
}

/**
 * Product links for the header menu (matches mazerp.com Products dropdown).
 *
 * @return list<array{id: string, label: string, description: string, href: string, current: bool}>
 */
function mazerp_products_menu(): array
{
    $base = mazerp_marketing_url();
    $items = [
        [
            'id' => 'books',
            'label' => 'Books',
            'description' => 'Billing, inventory & operations',
            'href' => $base . '/index.php',
            'current' => false,
        ],
        [
            'id' => 'crm',
            'label' => 'CRM',
            'description' => 'Leads, pipeline & customers',
            'href' => $base . '/crm/',
            'current' => false,
        ],
        [
            'id' => 'payroll',
            'label' => 'Payroll',
            'description' => 'Salary, payslips & compliance',
            'href' => $base . '/payroll/',
            'current' => true,
        ],
        [
            'id' => 'timex',
            'label' => 'Timex',
            'description' => 'Time & attendance',
            'href' => $base . '/timex/',
            'current' => false,
        ],
    ];

    return $items;
}

function contact_phone_display(): string
{
    return (string) (site_config()['contact_phone'] ?? '');
}

function contact_email_display(): string
{
    $c = site_config();
    $email = (string) ($c['contact_email'] ?? '');
    return $email !== '' ? $email : 'info@maztechno.com';
}

function contact_tel_href(): string
{
    $digits = (string) (site_config()['contact_phone_e164'] ?? '');
    $digits = preg_replace('/\D+/', '', $digits) ?? '';
    return $digits === '' ? '' : 'tel:+' . $digits;
}

function contact_whatsapp_href(?string $prefill = null): string
{
    $c = site_config();
    $digits = preg_replace('/\D+/', '', (string) ($c['contact_whatsapp_e164'] ?? '')) ?? '';
    if ($digits === '') {
        return '';
    }
    $text = $prefill ?? (string) ($c['contact_whatsapp_prefill'] ?? '');
    $url = 'https://wa.me/' . $digits;
    if ($text !== '') {
        $url .= '?text=' . rawurlencode($text);
    }

    return $url;
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

/**
 * Web path prefix when the site is served under a subdirectory (e.g. /payroll).
 * Auto-clears if the app runs at the vhost document root (e.g. php -S -t payroll).
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

    $cfg = site_config()['base_path'] ?? 'payroll';
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
