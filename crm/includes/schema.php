<?php
/**
 * JSON-LD helpers for Maz CRM microsite
 */

function crm_schema_organization() {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'MAZ Software Solutions',
        'url' => CRM_MAIN_SITE_URL . '/',
        'logo' => CRM_SITE_URL . '/assets/img/logo-crm.png',
        'email' => CONTACT_EMAIL,
        'telephone' => CONTACT_PHONE,
        'sameAs' => [],
    ];
}

function crm_schema_software() {
    global $crm_seo;
    return [
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => 'Maz CRM',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web, Cloud',
        'description' => $crm_seo['description'] ?? '',
        'url' => CRM_SITE_URL . '/',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'INR',
            'description' => 'Start free available',
        ],
    ];
}

function crm_schema_breadcrumb($items) {
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

function crm_schema_faq($faqs) {
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

function crm_print_json_ld($data) {
    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}
