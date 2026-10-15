<?php

declare(strict_types=1);

/**
 * Marketing site visual themes (books … books_5).
 * Preview: ?theme=books_2 on any page. Production default: MAZERP_THEME or config default_theme.
 */
function theme_registry(): array
{
    return [
        'books' => [
            'label' => 'Ledger Gateway',
            'description' => 'Slate hero, teal CTA — finance-first B2B.',
            'hero' => 'gateway',
            'header' => 'bar',
            'hero_trust' => true,
            'hero_eyebrow' => 'Books & accounting for India',
            'theme_color' => '#0f172a',
            'fonts' => 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Serif:wght@500;600&display=swap',
            'css' => 'assets/css/themes/books.css',
        ],
        'books_2' => [
            'label' => 'Flat Minimal',
            'description' => 'Light canvas, floating nav, sky-blue CTA — clean SaaS.',
            'hero' => 'light',
            'header' => 'float',
            'hero_trust' => false,
            'hero_eyebrow' => 'Accounting software for India',
            'theme_color' => '#0369a1',
            'fonts' => 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
            'css' => 'assets/css/themes/books_2.css',
        ],
        'books_3' => [
            'label' => 'Warm Ledger',
            'description' => 'Cream surfaces, teal accent — approachable finance ops.',
            'hero' => 'split',
            'header' => 'bar',
            'hero_trust' => true,
            'hero_eyebrow' => 'GST-ready books',
            'theme_color' => '#0f766e',
            'fonts' => 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=DM+Sans:wght@400;500;600;700&display=swap',
            'css' => 'assets/css/themes/books_3.css',
        ],
        'books_4' => [
            'label' => 'Editorial Contrast',
            'description' => 'High-contrast type, crimson CTA — bold and direct.',
            'hero' => 'ink',
            'header' => 'bar',
            'hero_trust' => false,
            'hero_eyebrow' => 'MazERP Books',
            'theme_color' => '#0a0a0a',
            'fonts' => 'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700&display=swap',
            'css' => 'assets/css/themes/books_4.css',
        ],
        'books_5' => [
            'label' => 'Indigo Glass',
            'description' => 'Soft indigo mesh, violet CTA — modern product-led.',
            'hero' => 'glass',
            'header' => 'bar',
            'hero_trust' => true,
            'hero_eyebrow' => 'MazERP Books',
            'theme_color' => '#4f46e5',
            'fonts' => 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Work+Sans:wght@400;500;600;700&display=swap',
            'css' => 'assets/css/themes/books_5.css',
        ],
    ];
}

function active_theme_id(): string
{
    static $resolved = null;
    if ($resolved !== null) {
        return $resolved;
    }

    $themes = theme_registry();
    $query = isset($_GET['theme']) ? (string) $_GET['theme'] : '';
    if ($query !== '' && isset($themes[$query])) {
        $resolved = $query;
        return $resolved;
    }

    $env = getenv('MAZERP_THEME') ?: '';
    if ($env !== '' && isset($themes[$env])) {
        $resolved = $env;
        return $resolved;
    }

    $default = site_config()['default_theme'] ?? 'books';
    $resolved = isset($themes[$default]) ? $default : 'books';
    return $resolved;
}

/** @return array<string, mixed> */
function active_theme(): array
{
    $id = active_theme_id();
    return theme_registry()[$id];
}

function with_theme_query(string $url): string
{
    if (!isset($_GET['theme'])) {
        return $url;
    }
    $id = (string) $_GET['theme'];
    if (!isset(theme_registry()[$id])) {
        return $url;
    }
    if (preg_match('#^https?://#i', $url)) {
        return $url;
    }
    if (str_contains($url, 'theme=')) {
        return $url;
    }
    $sep = str_contains($url, '?') ? '&' : '?';
    return $url . $sep . 'theme=' . rawurlencode($id);
}

function theme_preview_url(string $themeId): string
{
    $themes = theme_registry();
    if (!isset($themes[$themeId])) {
        $themeId = 'books';
    }
    $bp = base_path();
    $home = $bp === '' ? '/' : $bp . '/';
    return $home . '?theme=' . rawurlencode($themeId);
}
