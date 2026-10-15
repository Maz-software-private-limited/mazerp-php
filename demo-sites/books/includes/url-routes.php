<?php

declare(strict_types=1);

/** Home page section IDs (also used as pretty URL segments). */
function books_home_section_ids(): array
{
    return [
        'features',
        'how-it-works',
        'benefits',
        'security',
        'pricing',
        'faq',
        'contact',
    ];
}

/**
 * Pretty URL path (no leading slash) → PHP script relative to books/.
 *
 * @return array<string, string>
 */
function books_pretty_route_map(): array
{
    return [
        '' => 'index.php',
        'guides' => 'guides/index.php',
        'guides/gst-books-getting-started' => 'guides/gst-books-getting-started.php',
        'privacy' => 'privacy.php',
        'terms' => 'terms.php',
        'themes' => 'themes.php',
        'demo-request' => 'contact.php',
        'sitemap.xml' => 'sitemap.php',
        'robots.txt' => 'robots.php',
    ];
}

/** @return array{script: string, section: string|null} */
function books_resolve_route(string $prettyPath): ?array
{
    $prettyPath = trim($prettyPath, '/');
    $map = books_pretty_route_map();

    if ($prettyPath === 'contact' && strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        return ['script' => 'contact.php', 'section' => null];
    }

    if (array_key_exists($prettyPath, $map)) {
        return ['script' => $map[$prettyPath], 'section' => null];
    }

    if (in_array($prettyPath, books_home_section_ids(), true)) {
        return ['script' => 'index.php', 'section' => $prettyPath];
    }

    return null;
}

/** @deprecated Use books_resolve_route() */
function books_resolve_pretty_path(string $prettyPath): ?string
{
    $route = books_resolve_route($prettyPath);
    return $route === null ? null : $route['script'];
}

/** Link to a home section without hash URLs, e.g. /books/security */
function section_url(string $sectionId): string
{
    return route_url($sectionId);
}

/** Internal script path (e.g. guides/foo.php) → pretty segment path */
function internal_path_to_pretty(string $path): string
{
    $path = trim(str_replace('\\', '/', $path), '/');
    if ($path === '' || $path === 'index.php') {
        return '';
    }

    $map = books_pretty_route_map();
    foreach ($map as $pretty => $script) {
        if ($script === $path || $script === ltrim($path, '/')) {
            return $pretty;
        }
    }

    if (in_array($path, books_home_section_ids(), true)) {
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
