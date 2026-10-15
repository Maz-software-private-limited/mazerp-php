<?php

declare(strict_types=1);

function crm_home_section_ids(): array
{
    return array_keys(crm_home_section_catalog());
}

/**
 * @return array<string, array{file: string, title: string, description?: string, cta_band?: bool}>
 */
function crm_home_section_catalog(): array
{
    return [
        'why' => [
            'file' => 'why.php',
            'title' => 'Why Maz CRM',
            'description' => 'Clearer follow-ups, structured pipeline, and customer history for Indian sales teams.',
            'cta_band' => true,
        ],
        'features' => [
            'file' => 'features.php',
            'title' => 'CRM features',
            'description' => 'Lead management, pipeline, follow-ups, tasks, reports, and customer records in one workspace.',
            'cta_band' => true,
        ],
        'how-it-works' => [
            'file' => 'how-it-works.php',
            'title' => 'How Maz CRM works',
            'description' => 'From inquiry to closed deal—a repeatable sales loop your team can run every week.',
            'cta_band' => true,
        ],
        'pipeline' => [
            'file' => 'pipeline.php',
            'title' => 'Sales pipeline',
            'description' => 'Kanban stages, filters, and deal cards—the same board your reps use in the app.',
            'cta_band' => true,
        ],
        'follow-ups' => [
            'file' => 'follow-ups.php',
            'title' => 'Follow-ups & customers',
            'description' => 'Today and overdue queues, attempt logs, and contact timelines for clean handovers.',
            'cta_band' => true,
        ],
        'preview' => [
            'file' => 'preview.php',
            'title' => 'Product preview',
            'description' => 'Explore Deals, Leads, follow-ups, contacts, and reports UI samples.',
            'cta_band' => true,
        ],
        'security' => [
            'file' => 'security.php',
            'title' => 'Security & data protection',
            'description' => 'How sign-in, roles, and workspace data work in Maz CRM.',
            'cta_band' => true,
        ],
        'pricing' => [
            'file' => 'pricing.php',
            'title' => 'Pricing',
            'description' => 'Compare Basic, Standard, Professional, and Enterprise plans for leads, pipeline, follow-ups, and reports.',
            'cta_band' => true,
        ],
        'faq' => [
            'file' => 'faq.php',
            'title' => 'CRM FAQ',
            'description' => 'Common questions about Maz CRM for sales teams in India.',
            'cta_band' => true,
        ],
        'contact' => [
            'file' => 'contact.php',
            'title' => 'Book a demo',
            'description' => 'Request a walkthrough of pipeline, follow-ups, and reports on your sales process.',
            'cta_band' => false,
        ],
    ];
}

/** @return array{file: string, title: string, description?: string, cta_band?: bool}|null */
function crm_home_section_meta(string $sectionId): ?array
{
    $catalog = crm_home_section_catalog();
    return $catalog[$sectionId] ?? null;
}

/**
 * @return array<string, string>
 */
function crm_pretty_route_map(): array
{
    return [
        '' => 'index.php',
        'privacy' => 'privacy.php',
        'terms' => 'terms.php',
        'demo-request' => 'contact.php',
        'sitemap.xml' => 'sitemap.php',
        'robots.txt' => 'robots.php',
    ];
}

/** @return array{script: string, section: string|null} */
function crm_resolve_route(string $prettyPath): ?array
{
    $prettyPath = trim($prettyPath, '/');
    $map = crm_pretty_route_map();

    if ($prettyPath === 'contact' && strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        return ['script' => 'contact.php', 'section' => null];
    }

    if (array_key_exists($prettyPath, $map)) {
        return ['script' => $map[$prettyPath], 'section' => null];
    }

    if (in_array($prettyPath, crm_home_section_ids(), true)) {
        return ['script' => 'index.php', 'section' => $prettyPath];
    }

    return null;
}

function section_url(string $sectionId): string
{
    return route_url($sectionId);
}

function crm_current_home_section(): string
{
    if (isset($_GET['section'])) {
        $section = (string) $_GET['section'];
        if (in_array($section, crm_home_section_ids(), true)) {
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

    if (in_array($segment, crm_home_section_ids(), true)) {
        return $segment;
    }

    return '';
}

function internal_path_to_pretty(string $path): string
{
    $path = trim(str_replace('\\', '/', $path), '/');
    if ($path === '' || $path === 'index.php') {
        return '';
    }

    $map = crm_pretty_route_map();
    foreach ($map as $pretty => $script) {
        if ($script === $path || $script === ltrim($path, '/')) {
            return $pretty;
        }
    }

    if (in_array($path, crm_home_section_ids(), true)) {
        return $path;
    }

    if (str_ends_with($path, '.php')) {
        $path = substr($path, 0, -4);
    }
    if ($path === 'sitemap') {
        return 'sitemap.xml';
    }
    if ($path === 'contact.php') {
        return 'demo-request';
    }

    return $path;
}
