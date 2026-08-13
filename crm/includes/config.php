<?php
/**
 * Maz CRM microsite config
 */
require_once __DIR__ . '/../../includes/config.php';

define('CRM_SITE_NAME', 'Maz CRM');
define('CRM_SITE_URL', 'https://www.mazerp.com/crm');
define('CRM_ASSET_BASE', '../assets');
define('CRM_LOCAL_ASSET_BASE', 'assets');
define('CRM_LOGO_URL', 'assets/img/logo-crm.png');
define('CRM_SIGNUP_URL', 'https://app.mazerp.com/auth/register');
define('CRM_LOGIN_URL', 'https://app.mazerp.com/signin');
define('CRM_MAIN_SITE_URL', SITE_URL);

function crm_current_page() {
    $base = basename($_SERVER['PHP_SELF'], '.php');
    return $base !== '' ? $base : 'index';
}

function crm_canonical_path($page = null) {
    $page = $page ?? crm_current_page();
    if ($page === 'index') {
        return CRM_SITE_URL . '/';
    }
    return CRM_SITE_URL . '/' . $page . '.php';
}

$crm_default_seo = [
    'title'       => 'Maz CRM | Manage Leads, Pipeline & Close More Deals',
    'description' => 'Maz CRM helps sales teams capture leads, run follow-ups, manage pipelines, and close more deals. Cloud CRM for Indian businesses. Start free.',
    'keywords'    => 'CRM software India, lead management, sales pipeline, follow-up CRM, Maz CRM',
    'og_image'    => CRM_MAIN_SITE_URL . '/assets/img/ui-crm.svg',
];

$crm_page_seo = [
    'index' => [
        'title'       => 'Maz CRM | Manage Leads. Grow Relationships. Close More Deals.',
        'description' => 'Capture leads, assign owners, follow up on time, and convert customers with Maz CRM. Free trial — no credit card.',
    ],
    'features' => [
        'title'       => 'CRM Features | Leads, Pipeline, Follow-ups & Reports | Maz CRM',
        'description' => 'Explore Maz CRM features: lead management, customer profiles, sales pipeline, follow-ups, tasks, team access, and analytics.',
    ],
    'solutions' => [
        'title'       => 'CRM Solutions by Industry | Retail, Real Estate, B2B | Maz CRM',
        'description' => 'See how Maz CRM fits retail, real estate, agencies, service businesses, distributors, and B2B sales teams.',
    ],
    'pricing' => [
        'title'       => 'CRM Pricing | Sensational Software. Sensible Price. | Maz CRM',
        'description' => 'Transparent Maz CRM pricing. Monthly or yearly plans, powerful add-ons, free trial, cancel anytime.',
    ],
    'about' => [
        'title'       => 'About Maz CRM | Built for Growing Sales Teams',
        'description' => 'Maz CRM is built by MAZ Software Solutions to help Indian businesses manage leads, customers, and sales in one cloud platform.',
    ],
    'contact' => [
        'title'       => 'Contact Maz CRM | Talk to Our Team',
        'description' => 'Questions about Maz CRM? Contact our team by phone, email, or form. We typically respond within one business hour.',
    ],
    'demo' => [
        'title'       => 'Book a CRM Demo | Live Walkthrough | Maz CRM',
        'description' => 'Request a live Maz CRM demo tailored to your sales process. Free, no obligation, followed by a 7-day trial.',
    ],
];

$_crm_page = crm_current_page();
$crm_seo = array_merge($crm_default_seo, $crm_page_seo[$_crm_page] ?? []);

$crm_feature_links = [
    ['label' => 'Lead Management', 'url' => 'features.php#leads'],
    ['label' => 'Sales Pipeline', 'url' => 'features.php#pipeline'],
    ['label' => 'Follow-ups', 'url' => 'features.php#followups'],
    ['label' => 'Reports', 'url' => 'features.php#reports'],
];

$crm_solution_links = [
    ['label' => 'Retail', 'url' => 'solutions.php#retail'],
    ['label' => 'Real Estate', 'url' => 'solutions.php#real-estate'],
    ['label' => 'Distributors', 'url' => 'solutions.php#distributors'],
    ['label' => 'B2B Sales', 'url' => 'solutions.php#b2b'],
];

$crm_resource_links = [
    ['label' => 'Book a Demo', 'url' => 'demo.php'],
    ['label' => 'Blog', 'url' => CRM_MAIN_SITE_URL . '/blog.php'],
    ['label' => 'Contact Support', 'url' => 'contact.php'],
];
