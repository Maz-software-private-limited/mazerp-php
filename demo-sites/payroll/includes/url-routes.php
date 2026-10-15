<?php

declare(strict_types=1);

/** Home page section IDs (also used as pretty URL segments). */
function payroll_home_section_ids(): array
{
    return array_keys(payroll_home_section_catalog());
}

/**
 * Section slug → partial under includes/sections/ and page metadata.
 *
 * @return array<string, array{file: string, title: string, description?: string, cta_band?: bool}>
 */
function payroll_home_section_catalog(): array
{
    return [
        'features' => [
            'file' => 'features.php',
            'title' => 'Payroll features for India',
            'description' => 'Salary structures, attendance, leave, statutory deductions, and payslips in one monthly payroll workflow.',
            'cta_band' => true,
        ],
        'how-it-works' => [
            'file' => 'how-it-works.php',
            'title' => 'How MazERP Payroll works',
            'description' => 'Five steps from salary setup to approved payslips—built for monthly payroll in India.',
            'cta_band' => true,
        ],
        'benefits' => [
            'file' => 'benefits.php',
            'title' => 'Benefits of MazERP Payroll',
            'description' => 'Payroll software for small businesses, growing teams, and HR departments in India.',
            'cta_band' => true,
        ],
        'security' => [
            'file' => 'security.php',
            'title' => 'Security & compliance',
            'description' => 'How MazERP Payroll handles access, data, and statutory payroll workflows.',
            'cta_band' => true,
        ],
        'pricing' => [
            'file' => 'pricing.php',
            'title' => 'Pricing',
            'description' => 'One plan for monthly payroll runs, statutory components, attendance, leave, and payslips.',
            'cta_band' => false,
        ],
        'faq' => [
            'file' => 'faq.php',
            'title' => 'Payroll FAQ',
            'description' => 'Common questions about MazERP Payroll for Indian businesses.',
            'cta_band' => true,
        ],
        'contact' => [
            'file' => 'contact.php',
            'title' => 'Contact & demo',
            'description' => 'Book a walkthrough of MazERP Payroll on your monthly payroll cycle.',
            'cta_band' => false,
        ],
    ];
}

/** @return array{file: string, title: string, description?: string, cta_band?: bool}|null */
function payroll_home_section_meta(string $sectionId): ?array
{
    $catalog = payroll_home_section_catalog();
    return $catalog[$sectionId] ?? null;
}

/**
 * Pretty URL path (no leading slash) → PHP script relative to payroll/.
 *
 * @return array<string, string>
 */
function payroll_pretty_route_map(): array
{
    return [
        '' => 'index.php',
        'guides' => 'guides/index.php',
        'guides/monthly-payroll-checklist-india' => 'guides/monthly-payroll-checklist-india.php',
        'privacy' => 'privacy.php',
        'terms' => 'terms.php',
        'themes' => 'themes.php',
        'demo-request' => 'contact.php',
        'sitemap.xml' => 'sitemap.php',
        'robots.txt' => 'robots.php',
    ];
}

/** @return array{script: string, section: string|null} */
function payroll_resolve_route(string $prettyPath): ?array
{
    $prettyPath = trim($prettyPath, '/');
    $map = payroll_pretty_route_map();

    if ($prettyPath === 'contact' && strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        return ['script' => 'contact.php', 'section' => null];
    }

    if (array_key_exists($prettyPath, $map)) {
        return ['script' => $map[$prettyPath], 'section' => null];
    }

    if (in_array($prettyPath, payroll_home_section_ids(), true)) {
        return ['script' => 'index.php', 'section' => $prettyPath];
    }

    return null;
}

/** @deprecated Use payroll_resolve_route() */
function payroll_resolve_pretty_path(string $prettyPath): ?string
{
    $route = payroll_resolve_route($prettyPath);
    return $route === null ? null : $route['script'];
}

/** Link to a home section without hash URLs, e.g. /payroll/security */
function section_url(string $sectionId): string
{
    return route_url($sectionId);
}

/** Section slug from ?section= or from the request path (e.g. /payroll/pricing). */
function payroll_current_home_section(): string
{
    if (isset($_GET['section'])) {
        $section = (string) $_GET['section'];
        if (in_array($section, payroll_home_section_ids(), true)) {
            return $section;
        }
    }

    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '';
    $path = trim(rawurldecode($path), '/');
    $bp = function_exists('base_path') ? base_path() : '';
    if ($bp !== '' && ($path === $bp || str_starts_with($path, $bp . '/'))) {
        $path = trim(substr($path, strlen($bp)), '/');
    }

    $segment = $path;
    if (str_contains($segment, '/')) {
        $segment = basename($segment);
    }

    if (in_array($segment, payroll_home_section_ids(), true)) {
        return $segment;
    }

    return '';
}

/** Internal script path (e.g. guides/foo.php) → pretty segment path */
function internal_path_to_pretty(string $path): string
{
    $path = trim(str_replace('\\', '/', $path), '/');
    if ($path === '' || $path === 'index.php') {
        return '';
    }

    $map = payroll_pretty_route_map();
    foreach ($map as $pretty => $script) {
        if ($script === $path || $script === ltrim($path, '/')) {
            return $pretty;
        }
    }

    if (in_array($path, payroll_home_section_ids(), true)) {
        return $path;
    }

    if (str_ends_with($path, '.php')) {
        $path = substr($path, 0, -4);
    }
    if ($path === 'guides/index') {
        return 'guides';
    }
    if ($path === 'sitemap') {
        return 'sitemap.xml';
    }
    if ($path === 'contact.php') {
        return 'demo-request';
    }

    return $path;
}
