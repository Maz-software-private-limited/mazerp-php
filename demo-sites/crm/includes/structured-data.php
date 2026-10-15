<?php

declare(strict_types=1);

/** @return array<string, mixed> */
function schema_organization(): array
{
    $c = site_config();
    $logo = absolute_url($c['seo']['og_image'] ?? 'assets/img/logo.png');

    return [
        '@type' => 'Organization',
        '@id' => absolute_url('') . '#organization',
        'name' => $c['company_name'],
        'url' => absolute_url(''),
        'logo' => [
            '@type' => 'ImageObject',
            'url' => $logo,
        ],
    ];
}

/** @return array<string, mixed> */
function schema_web_site(): array
{
    $c = site_config();

    return [
        '@type' => 'WebSite',
        '@id' => absolute_url('') . '#website',
        'name' => $c['site_name'],
        'url' => absolute_url(''),
        'publisher' => ['@id' => absolute_url('') . '#organization'],
    ];
}

/** @return array<string, mixed> */
function schema_software_application(): array
{
    $c = site_config();

    return [
        '@type' => 'SoftwareApplication',
        '@id' => absolute_url('') . '#software',
        'name' => $c['site_name'],
        'applicationCategory' => 'BusinessApplication',
        'applicationSubCategory' => 'CRM',
        'operatingSystem' => 'Web',
        'description' => $c['meta_description'],
        'url' => absolute_url(''),
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'INR',
            'description' => 'Contact for plan pricing',
        ],
    ];
}

/** @param list<array{question: string, answer: string}> $faq */
function schema_faq_page(array $faq): array
{
    $entities = [];
    foreach ($faq as $item) {
        $entities[] = [
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $item['answer'],
            ],
        ];
    }

    return [
        '@type' => 'FAQPage',
        '@id' => absolute_url('') . '#faq',
        'mainEntity' => $entities,
    ];
}

/** @param list<array<string, mixed>> $nodes */
function schema_graph(array $nodes): array
{
    return [
        '@context' => 'https://schema.org',
        '@graph' => $nodes,
    ];
}

/** @param array<string, mixed>|list<array<string, mixed>> $data */
function render_json_ld(array $data): void
{
    if (isset($data['@graph']) || isset($data['@context'])) {
        echo json_ld_script($data);
        return;
    }
    foreach ($data as $block) {
        if (is_array($block)) {
            echo json_ld_script($block);
        }
    }
}
