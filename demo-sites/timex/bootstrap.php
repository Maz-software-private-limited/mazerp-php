<?php

declare(strict_types=1);

$config = require __DIR__ . '/config.php';

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

    $cfg = (string) (site_config()['base_path'] ?? 'timex');
    $configured = '/' . trim($cfg, '/');
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    if ($script !== '' && !str_starts_with($script, $configured . '/') && $script !== $configured) {
        $dir = rtrim(dirname($script), '/\\');
        if ($dir === '' || $dir === '.' || $dir === '/') {
            $resolved = '';
        } else {
            $resolved = $dir;
        }
        return $resolved;
    }

    $resolved = $configured;
    return $resolved;
}

function asset_url(string $path): string
{
    $bp = base_path();
    $prefix = $bp === '' ? '' : $bp;
    return $prefix . '/' . ltrim($path, '/');
}

function route_url(string $anchor = ''): string
{
    $bp = base_path();
    $url = $bp === '' ? '/' : $bp . '/';
    if ($anchor !== '') {
        $url .= '#' . ltrim($anchor, '#');
    }
    return $url;
}

function demo_request_url(): string
{
    $bp = base_path();
    return ($bp === '' ? '' : $bp) . '/demo-request';
}

function login_url(): string
{
    $c = site_config();
    $return = $c['timex_app_url'] . '/';
    return $c['console_url'] . '/auth/login?returnUrl=' . rawurlencode($return);
}

function get_started_url(): string
{
    return site_config()['timex_app_url'] . '/initialize';
}

function contact_whatsapp_href(): string
{
    $c = site_config();
    $digits = preg_replace('/\D+/', '', (string) ($c['contact_whatsapp_e164'] ?? '')) ?? '';
    if ($digits === '') {
        return '';
    }
    $text = (string) ($c['contact_whatsapp_prefill'] ?? '');
    $url = 'https://wa.me/' . $digits;
    if ($text !== '') {
        $url .= '?text=' . rawurlencode($text);
    }
    return $url;
}

function contact_tel_href(): string
{
    $digits = preg_replace('/\D+/', '', (string) (site_config()['contact_phone_e164'] ?? '')) ?? '';
    return $digits === '' ? '' : 'tel:+' . $digits;
}

/** @return array<string, mixed> */
function pricing_plan(): array
{
    $plan = site_config()['pricing']['plan'] ?? [];
    return is_array($plan) ? $plan : [];
}
