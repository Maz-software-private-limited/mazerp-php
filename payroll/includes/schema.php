<?php
/**
 * JSON-LD helpers for Maz Payroll microsite
 */

function payroll_schema_organization() {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'MAZ Software Solutions',
        'url' => PAYROLL_MAIN_SITE_URL . '/',
        'logo' => PAYROLL_MAIN_SITE_URL . PAYROLL_LOGO_URL,
        'email' => CONTACT_EMAIL,
        'telephone' => CONTACT_PHONE,
        'sameAs' => [],
    ];
}

function payroll_schema_software() {
    global $payroll_seo;
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => 'Maz Payroll',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web, Cloud',
        'description' => $payroll_seo['description'] ?? '',
        'url' => PAYROLL_SITE_URL . '/',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'INR',
            'description' => 'Start free available',
        ],
    ];
    return $schema;
}

function payroll_schema_breadcrumb($items) {
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

function payroll_schema_faq($faqs) {
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

function payroll_print_json_ld($data) {
    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}
