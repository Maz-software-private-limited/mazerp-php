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

/** @param list<array{name: string, url: string}> $items */
function schema_breadcrumb_list(array $items): array
{
    $elements = [];
    $position = 1;
    foreach ($items as $item) {
        $elements[] = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $item['name'],
            'item' => $item['url'],
        ];
        $position++;
    }

    return [
        '@type' => 'BreadcrumbList',
        'itemListElement' => $elements,
    ];
}

/** @return array<string, mixed> */
function schema_howto_monthly_payroll_checklist(): array
{
    return [
        '@type' => 'HowTo',
        'name' => 'Monthly payroll checklist for Indian businesses',
        'description' => 'Steps to run monthly payroll in India: attendance, salary master, gross-to-net with PF ESI TDS, approval, payslips, and statutory handoff.',
        'step' => [
            [
                '@type' => 'HowToStep',
                'name' => 'Close attendance and leave',
                'text' => 'Freeze the pay period, confirm working days, overtime, and loss of pay (LOP) before calculating salaries.',
            ],
            [
                '@type' => 'HowToStep',
                'name' => 'Validate employee and salary data',
                'text' => 'Update joiners, exits, and revisions; confirm each employee is on the correct salary structure.',
            ],
            [
                '@type' => 'HowToStep',
                'name' => 'Run gross-to-net calculations',
                'text' => 'Calculate earnings and deductions including PF, ESI, and TDS where applicable.',
            ],
            [
                '@type' => 'HowToStep',
                'name' => 'Review and approve payroll',
                'text' => 'Check exceptions and totals, then approve the run before payouts.',
            ],
            [
                '@type' => 'HowToStep',
                'name' => 'Publish payslips and payment files',
                'text' => 'Generate payslips and bank payment instructions from the approved run.',
            ],
            [
                '@type' => 'HowToStep',
                'name' => 'Hand off statutory records',
                'text' => 'Retain registers and supporting data for PF, ESI, and TDS filing.',
            ],
        ],
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
