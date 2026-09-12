<?php
/**
 * JSON-LD helpers for Maz Timex microsite
 */

function timex_schema_organization() {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'MAZ Software Solutions',
        'url' => TIMEX_MAIN_SITE_URL . '/',
        'logo' => TIMEX_SITE_URL . '/assets/img/logo-timex.png',
        'email' => CONTACT_EMAIL,
        'telephone' => CONTACT_PHONE,
        'sameAs' => [],
    ];
}

function timex_schema_software() {
    global $timex_seo;
    return [
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => 'Maz Timex',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web, Cloud, Mobile',
        'description' => $timex_seo['description'] ?? '',
        'url' => TIMEX_SITE_URL . '/',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'INR',
            'description' => 'Start free available',
        ],
    ];
}

function timex_schema_breadcrumb($items) {
    $list = [];
    $pos = 1;
    foreach ($items as $item) {
        $list[] = [
            '@type' => 'ListItem',
            'position' => $pos++,
            'name' => $item['name'],
            'item' => $item['url'],
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $list,
    ];
}

function timex_schema_faq($faqs) {
    $entities = [];
    foreach ($faqs as $faq) {
        $entities[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a'],
            ],
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $entities,
    ];
}

function timex_print_json_ld($data) {
    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}
