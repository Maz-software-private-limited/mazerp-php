<?php
/**
 * Maz CRM microsite config
 */
require_once __DIR__ . '/../../includes/config.php';

define('CRM_SITE_NAME', 'Maz CRM');
define('CRM_SITE_URL', 'https://www.mazerp.com/crm');
define('CRM_SIGNUP_URL', 'https://app.mazerp.com/auth/register');
define('CRM_LOGIN_URL', 'https://app.mazerp.com/signin');
define('CRM_MAIN_SITE_URL', SITE_URL);

/**
 * Web path to this microsite (e.g. "/crm") so assets/links work
 * even when the URL has no trailing slash.
 */
function crm_web_base() {
    static $base = null;
    if ($base !== null) {
        return $base;
    }
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $crmRoot = realpath(__DIR__ . '/..');
    if ($docRoot && $crmRoot && strpos($crmRoot, $docRoot) === 0) {
        $rel = str_replace('\\', '/', substr($crmRoot, strlen($docRoot)));
        $base = $rel === '' ? '' : $rel;
    } else {
        $base = '/crm';
    }
    return $base;
}

define('CRM_WEB_BASE', crm_web_base());
define('CRM_ASSET_BASE', '../assets');
define('CRM_LOCAL_ASSET_BASE', CRM_WEB_BASE . '/assets');
define('CRM_LOGO_URL', CRM_LOCAL_ASSET_BASE . '/img/logo-crm.png');

/**
 * Portal plans API base (no trailing slash).
 * Prod: 'https://api.mazerp.com/v2/portal'
 */
define('CRM_PLANS_API_BASE', 'http://localhost:3000/portal');
define('CRM_PLANS_CACHE_TTL', 600);
define('CRM_PLANS_TIMEOUT', 5);

/** Used only for static fallback plans when the live API is unavailable. */
define('CRM_SHOW_PRICES', false);

function crm_current_page() {
    $base = basename($_SERVER['PHP_SELF'], '.php');
    return $base !== '' ? $base : 'index';
}

function crm_url($page = null) {
    $page = $page ?? crm_current_page();
    $root = CRM_WEB_BASE === '' ? '' : CRM_WEB_BASE;
    if ($page === 'index' || $page === '' || $page === null) {
        return $root . '/';
    }
    // .php keeps links working on PHP built-in server; Apache .htaccess also serves clean URLs.
    return $root . '/' . $page . '.php';
}

function crm_canonical_path($page = null) {
    $page = $page ?? crm_current_page();
    if ($page === 'index') {
        return CRM_SITE_URL . '/';
    }
    return CRM_SITE_URL . '/' . $page;
}

function crm_nav_is_active($slugs) {
    $current = crm_current_page();
    if (!is_array($slugs)) {
        $slugs = [$slugs];
    }
    return in_array($current, $slugs, true);
}

$crm_default_seo = [
    'title'       => 'CRM Software for Sales Teams | Maz CRM',
    'description' => 'Maz CRM helps growing businesses capture leads, run follow-ups, manage the pipeline, and convert customers from one cloud workspace.',
    'keywords'    => 'CRM software, CRM software India, lead management software, sales pipeline CRM, Maz CRM',
    'og_image'    => CRM_SITE_URL . '/assets/img/logo-crm.png',
    'robots'      => 'index, follow, max-image-preview:large',
];

$crm_page_seo = [
    'index' => [
        'title'       => 'CRM Software for Sales Teams | Maz CRM',
        'description' => 'Manage leads, follow-ups, pipeline, and customers in one place. Maz CRM gives sales teams a clearer path from inquiry to closed deal.',
    ],
    'features' => [
        'title'       => 'CRM Software Features | Maz CRM',
        'description' => 'Explore Maz CRM features: lead management, customer profiles, sales pipeline, follow-ups, tasks, team access, and reports.',
    ],
    'sales-pipeline' => [
        'title'       => 'Sales Pipeline Software | Maz CRM',
        'description' => 'See every deal by stage, owner, and value. Maz CRM keeps the pipeline visual so managers can coach the team and forecast revenue.',
    ],
    'lead-management' => [
        'title'       => 'Lead Management Software | Maz CRM',
        'description' => 'Capture, assign, and qualify leads from website, WhatsApp, walk-ins, and imports—without losing ownership or follow-up history.',
    ],
    'customer-management' => [
        'title'       => 'Customer Management Software | Maz CRM',
        'description' => 'Keep customer profiles, communication history, and outstanding context together so sales and support share one record.',
    ],
    'follow-ups' => [
        'title'       => 'Follow-up & Reminder Software | Maz CRM',
        'description' => 'Today and overdue queues, attempt logs, and tasks keep every conversation moving—so leads do not go cold.',
    ],
    'crm-reports' => [
        'title'       => 'CRM Reports & Analytics | Maz CRM',
        'description' => 'Review lead sources, conversion, aging, pipeline value, and team performance from Maz CRM reports.',
    ],
    'pricing' => [
        'title'       => 'CRM Software Pricing | Maz CRM',
        'description' => 'Compare Maz CRM plans for startups and growing sales teams. Start free or book a demo to see user limits and reporting options.',
    ],
    'faq' => [
        'title'       => 'CRM Software FAQ | Maz CRM',
        'description' => 'Answers about lead capture, pipeline, follow-ups, imports, mobile access, and how Maz CRM works for Indian sales teams.',
    ],
    'contact' => [
        'title'       => 'Book a CRM Demo | Contact Maz CRM',
        'description' => 'Request a Maz CRM demo. Share your company details and team size—we will walk you through leads, pipeline, and follow-ups.',
    ],
    '404' => [
        'title'       => 'Page Not Found | Maz CRM',
        'description' => 'The page you requested could not be found. Return to Maz CRM home or explore features, pricing, and contact options.',
        'robots'      => 'noindex, follow',
    ],
];

$_crm_page = crm_current_page();
$crm_seo = array_merge($crm_default_seo, $crm_page_seo[$_crm_page] ?? []);

$crm_nav_links = [
    ['label' => 'Home', 'url' => crm_url('index'), 'slug' => 'index'],
    ['label' => 'Features', 'url' => crm_url('features'), 'slug' => 'features'],
    ['label' => 'Pipeline', 'url' => crm_url('sales-pipeline'), 'slug' => 'sales-pipeline'],
    ['label' => 'Follow-ups', 'url' => crm_url('follow-ups'), 'slug' => 'follow-ups'],
    ['label' => 'Pricing', 'url' => crm_url('pricing'), 'slug' => 'pricing'],
    ['label' => 'FAQ', 'url' => crm_url('faq'), 'slug' => 'faq'],
];

$crm_feature_links = [
    ['label' => 'Lead Management', 'url' => crm_url('lead-management')],
    ['label' => 'Customer Management', 'url' => crm_url('customer-management')],
    ['label' => 'Sales Pipeline', 'url' => crm_url('sales-pipeline')],
    ['label' => 'Follow-ups', 'url' => crm_url('follow-ups')],
    ['label' => 'Reports', 'url' => crm_url('crm-reports')],
];

$crm_footer_product = [
    ['label' => 'Features', 'url' => crm_url('features')],
    ['label' => 'Lead Management', 'url' => crm_url('lead-management')],
    ['label' => 'Customer Management', 'url' => crm_url('customer-management')],
    ['label' => 'Sales Pipeline', 'url' => crm_url('sales-pipeline')],
    ['label' => 'Follow-ups', 'url' => crm_url('follow-ups')],
    ['label' => 'CRM Reports', 'url' => crm_url('crm-reports')],
];

$crm_plans = [
    [
        'key' => 'standard',
        'name' => 'Standard',
        'icon' => 'blue',
        'icon_fa' => 'fa-seedling',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For small teams getting leads off spreadsheets.',
        'features' => [
            'Lead capture & assignment',
            'Customer profiles',
            'Follow-up reminders',
            'Task management',
            'Core CRM reports',
            'Email support',
        ],
    ],
    [
        'key' => 'professional',
        'name' => 'Professional',
        'icon' => 'navy',
        'icon_fa' => 'fa-briefcase',
        'monthly' => '',
        'yearly' => '',
        'popular' => true,
        'blurb' => 'For growing sales teams that need pipeline depth and more reporting.',
        'features' => [
            'Everything in Standard',
            'Sales pipeline & deal stages',
            'Workflow automation*',
            'Advanced reports*',
            'Team performance views',
            'Priority onboarding support',
        ],
        'note' => '*Some capabilities may depend on your plan or add-ons.',
    ],
    [
        'key' => 'premium',
        'name' => 'Premium',
        'icon' => 'slate',
        'icon_fa' => 'fa-building',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For sales and operations teams that need scale and guided rollout.',
        'features' => [
            'Everything in Professional',
            'Higher user and contact limits',
            'Custom fields*',
            'Guided implementation',
            'Priority support',
        ],
    ],
];

$crm_faq_items = [
    [
        'q' => 'What is Maz CRM?',
        'a' => 'Maz CRM is a cloud workspace for sales teams. It helps you capture leads, assign owners, run follow-ups, move deals through a pipeline, keep customer history, and review conversion reports from one place.',
    ],
    [
        'q' => 'How does lead management work?',
        'a' => 'Inquiries from website forms, WhatsApp, walk-ins, campaigns, and CSV imports land in one queue. You assign an owner and status so every lead has a next step instead of sitting in a spreadsheet.',
    ],
    [
        'q' => 'Can I import existing leads?',
        'a' => 'Yes. Import leads and contacts from Excel or CSV. Our team can help with bulk migration during onboarding if you need a guided cutover.',
    ],
    [
        'q' => 'How does the sales pipeline work?',
        'a' => 'Deals move through visual stages such as new, qualified, proposal, and won. Each deal has an owner, expected value, and next activity so managers can coach the team and see open pipeline.',
    ],
    [
        'q' => 'How are follow-ups tracked?',
        'a' => 'Today and overdue queues show what is due. Agents log attempts against the lead or deal, so handovers keep the conversation history instead of starting over.',
    ],
    [
        'q' => 'Does Maz CRM work on mobile?',
        'a' => 'Yes. Maz CRM runs in any modern mobile browser so field reps can update leads and follow-ups on the go.',
    ],
    [
        'q' => 'Can more than one person use it?',
        'a' => 'Yes. Roles and ownership let telecallers, field reps, and managers share the same leads, pipeline, and reports with the right access.',
    ],
    [
        'q' => 'What reports are available?',
        'a' => 'Typical views include lead sources, conversion, aging, pipeline value, follow-up completion, and team performance. Exact reports can depend on your plan.',
    ],
    [
        'q' => 'Is there a free trial?',
        'a' => 'Yes. Use Start Free to begin in the product, or Book a Demo for a guided walkthrough of leads, pipeline, and follow-ups.',
    ],
    [
        'q' => 'How does Maz CRM fit with MazERP?',
        'a' => 'Maz CRM is part of the MazERP suite. You can start with CRM for sales, then add billing, inventory, payroll, or attendance when your team is ready.',
    ],
];
