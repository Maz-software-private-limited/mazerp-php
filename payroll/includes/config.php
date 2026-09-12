<?php
/**
 * Maz Payroll microsite config
 */
require_once __DIR__ . '/../../includes/config.php';

define('PAYROLL_SITE_NAME', 'Maz Payroll');
define('PAYROLL_SITE_URL', 'https://www.mazerp.com/payroll');
define('PAYROLL_SIGNUP_URL', 'https://app.mazerp.com/auth/register');
define('PAYROLL_LOGIN_URL', 'https://app.mazerp.com/signin');
define('PAYROLL_MAIN_SITE_URL', SITE_URL);

/**
 * Web path to this microsite (e.g. "/payroll") so assets/links work
 * even when the URL has no trailing slash.
 */
function payroll_web_base() {
    static $base = null;
    if ($base !== null) {
        return $base;
    }
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $payrollRoot = realpath(__DIR__ . '/..');
    if ($docRoot && $payrollRoot && strpos($payrollRoot, $docRoot) === 0) {
        $rel = str_replace('\\', '/', substr($payrollRoot, strlen($docRoot)));
        $base = $rel === '' ? '' : $rel;
    } else {
        $base = '/payroll';
    }
    return $base;
}

define('PAYROLL_WEB_BASE', payroll_web_base());
define('PAYROLL_ASSET_BASE', '../assets');
define('PAYROLL_LOCAL_ASSET_BASE', PAYROLL_WEB_BASE . '/assets');
define('PAYROLL_LOGO_URL', PAYROLL_LOCAL_ASSET_BASE . '/img/logo-payroll.png');

/**
 * Portal plans API base (no trailing slash).
 * Prod: 'https://api.mazerp.com/v2/portal'
 */
define('PAYROLL_PLANS_API_BASE', 'http://localhost:3000/portal');
define('PAYROLL_PLANS_CACHE_TTL', 600);
define('PAYROLL_PLANS_TIMEOUT', 5);

/** Used only for static fallback plans when the live API is unavailable. */
define('PAYROLL_SHOW_PRICES', false);

function payroll_current_page() {
    $base = basename($_SERVER['PHP_SELF'], '.php');
    return $base !== '' ? $base : 'index';
}

function payroll_url($page = null) {
    $page = $page ?? payroll_current_page();
    $root = PAYROLL_WEB_BASE === '' ? '' : PAYROLL_WEB_BASE;
    if ($page === 'index' || $page === '' || $page === null) {
        return $root . '/';
    }
    // .php keeps links working on PHP built-in server; Apache .htaccess also serves clean URLs.
    return $root . '/' . $page . '.php';
}

function payroll_canonical_path($page = null) {
    $page = $page ?? payroll_current_page();
    if ($page === 'index') {
        return PAYROLL_SITE_URL . '/';
    }
    return PAYROLL_SITE_URL . '/' . $page;
}

function payroll_nav_is_active($slugs) {
    $current = payroll_current_page();
    if (!is_array($slugs)) {
        $slugs = [$slugs];
    }
    return in_array($current, $slugs, true);
}

$payroll_default_seo = [
    'title'       => 'Payroll Software for Businesses | Maz Payroll',
    'description' => 'Maz Payroll helps growing businesses manage employees, salary, attendance, statutory deductions, payslips, and payroll runs from one cloud platform.',
    'keywords'    => 'payroll software, payroll software India, salary management software, EPF ESI payroll, Maz Payroll',
    'og_image'    => PAYROLL_SITE_URL . '/assets/img/logo-payroll.png',
    'robots'      => 'index, follow, max-image-preview:large',
];

$payroll_page_seo = [
    'index' => [
        'title'       => 'Payroll Software for Businesses | Maz Payroll',
        'description' => 'Payroll made simple for growing businesses. Manage employees, salary, attendance, leave, EPF, ESI, PT, TDS, payslips, and payroll processing in one place.',
    ],
    'features' => [
        'title'       => 'Payroll Software Features | Maz Payroll',
        'description' => 'Explore Maz Payroll features: employee management, salary structures, payroll runs, attendance, leave, statutory components, payslips, and reports.',
    ],
    'payroll-management' => [
        'title'       => 'Payroll Management Software | Maz Payroll',
        'description' => 'Run payroll end to end: configure salary, track attendance and leave, calculate payroll, review deductions, approve runs, and generate payslips.',
    ],
    'employee-management' => [
        'title'       => 'Employee Payroll Management Software | Maz Payroll',
        'description' => 'Manage employee profiles, bank details, PAN, PF and ESI information, salary assignments, and employment records for accurate payroll.',
    ],
    'salary-management' => [
        'title'       => 'Salary Management Software | Maz Payroll',
        'description' => 'Configure salary components, structures, CTC, earnings, deductions, and employer contributions with clear monthly payroll calculations.',
    ],
    'statutory-compliance' => [
        'title'       => 'Payroll Statutory Compliance Software | Maz Payroll',
        'description' => 'Help manage EPF, ESI, Professional Tax, and TDS payroll components with configurable settings and statutory reports. Rules can change—verify requirements.',
    ],
    'payslips' => [
        'title'       => 'Online Payslip Software | Maz Payroll',
        'description' => 'Generate professional payslips with earnings, deductions, and employer contributions after payroll is locked and paid in Maz Payroll.',
    ],
    'payroll-reports' => [
        'title'       => 'Payroll Reports Software | Maz Payroll',
        'description' => 'Access payroll summary, salary register, earnings and deductions, attendance, leave, LOP, EPF, ESI, and payment reports from Maz Payroll.',
    ],
    'pricing' => [
        'title'       => 'Payroll Software Pricing | Maz Payroll',
        'description' => 'Compare Maz Payroll plans for startups and growing teams. Start free or book a demo to see employee limits, reports, and statutory options.',
    ],
    'faq' => [
        'title'       => 'Payroll Software FAQ | Maz Payroll',
        'description' => 'Answers about payroll processing, salary components, EPF, ESI, Professional Tax, TDS, payslips, and how Maz Payroll works for Indian businesses.',
    ],
    'contact' => [
        'title'       => 'Book a Payroll Demo | Contact Maz Payroll',
        'description' => 'Request a Maz Payroll demo. Share your company details and team size—we will walk you through employees, salary, statutory, and payroll runs.',
    ],
    '404' => [
        'title'       => 'Page Not Found | Maz Payroll',
        'description' => 'The page you requested could not be found. Return to Maz Payroll home or explore features, pricing, and contact options.',
        'robots'      => 'noindex, follow',
    ],
];

$_payroll_page = payroll_current_page();
$payroll_seo = array_merge($payroll_default_seo, $payroll_page_seo[$_payroll_page] ?? []);

$payroll_nav_links = [
    ['label' => 'Home', 'url' => payroll_url('index'), 'slug' => 'index'],
    ['label' => 'Features', 'url' => payroll_url('features'), 'slug' => 'features'],
    ['label' => 'Payroll', 'url' => payroll_url('payroll-management'), 'slug' => 'payroll-management'],
    ['label' => 'Compliance', 'url' => payroll_url('statutory-compliance'), 'slug' => 'statutory-compliance'],
    ['label' => 'Pricing', 'url' => payroll_url('pricing'), 'slug' => 'pricing'],
    ['label' => 'FAQ', 'url' => payroll_url('faq'), 'slug' => 'faq'],
];

/** Other Maz products shown in the navbar Products dropdown (after Home). */
$payroll_suite_products = [
    [
        'label' => 'Books',
        'url'   => PAYROLL_MAIN_SITE_URL . '/erp.php',
        'desc'  => 'Billing, inventory & operations',
    ],
    [
        'label' => 'CRM',
        'url'   => PAYROLL_MAIN_SITE_URL . '/crm/',
        'desc'  => 'Leads, pipeline & customers',
    ],
    [
        'label' => 'Timex',
        'url'   => 'https://app.mazerp.com/timex/dashboard',
        'desc'  => 'Time & attendance',
    ],
];

$payroll_feature_links = [
    ['label' => 'Employee Management', 'url' => payroll_url('employee-management')],
    ['label' => 'Salary Management', 'url' => payroll_url('salary-management')],
    ['label' => 'Payroll Processing', 'url' => payroll_url('payroll-management')],
    ['label' => 'Payslips', 'url' => payroll_url('payslips')],
    ['label' => 'Reports', 'url' => payroll_url('payroll-reports')],
];

$payroll_footer_product = [
    ['label' => 'Features', 'url' => payroll_url('features')],
    ['label' => 'Payroll Management', 'url' => payroll_url('payroll-management')],
    ['label' => 'Employee Management', 'url' => payroll_url('employee-management')],
    ['label' => 'Salary Management', 'url' => payroll_url('salary-management')],
    ['label' => 'Statutory Compliance', 'url' => payroll_url('statutory-compliance')],
    ['label' => 'Payslips', 'url' => payroll_url('payslips')],
    ['label' => 'Payroll Reports', 'url' => payroll_url('payroll-reports')],
];

$payroll_plans = [
    [
        'key' => 'starter',
        'name' => 'Starter',
        'icon' => 'teal',
        'icon_fa' => 'fa-seedling',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For small teams getting payroll off spreadsheets.',
        'features' => [
            'Employee profiles & salary assignment',
            'Salary components & structures',
            'Attendance & leave basics',
            'Payroll month & payroll runs',
            'Payslip generation (PDF)',
            'Core payroll reports',
            'Email support',
        ],
    ],
    [
        'key' => 'growth',
        'name' => 'Growth',
        'icon' => 'navy',
        'icon_fa' => 'fa-briefcase',
        'monthly' => '',
        'yearly' => '',
        'popular' => true,
        'blurb' => 'For growing businesses that need statutory depth and more reporting.',
        'features' => [
            'Everything in Starter',
            'EPF & ESI configuration',
            'Professional Tax & TDS reports*',
            'Advanced payroll reports*',
            'Overtime tracking*',
            'Multi-branch payroll context',
            'Priority onboarding support',
        ],
        'note' => '*Some capabilities may depend on your plan or add-ons.',
    ],
    [
        'key' => 'business',
        'name' => 'Business',
        'icon' => 'slate',
        'icon_fa' => 'fa-building',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For HR and finance teams that need scale and guided rollout.',
        'features' => [
            'Everything in Growth',
            'Higher employee limits',
            'Guided implementation',
            'Dedicated success check-ins',
            'Custom onboarding walkthrough',
            'Priority support',
        ],
    ],
];

$payroll_faq_items = [
    [
        'q' => 'What is payroll software?',
        'a' => 'Payroll software helps businesses calculate salaries, apply earnings and deductions, manage statutory components, run payroll for a pay period, and generate payslips and reports from one system.',
    ],
    [
        'q' => 'How does payroll processing work in Maz Payroll?',
        'a' => 'You set up employees and salary, capture attendance and leave for the month, optionally lock inputs, create a payroll run, process calculations, review employee lines, then approve, lock, and mark payments before generating payslips.',
    ],
    [
        'q' => 'How are salary components calculated?',
        'a' => 'You configure earnings, deductions, and employer contributions as salary components—using fixed amounts, percentages, or formulas—then group them into salary structures and assign CTC to employees.',
    ],
    [
        'q' => 'How are statutory deductions handled?',
        'a' => 'Maz Payroll helps you configure statutory components such as EPF and ESI at the organisation level, capture relevant employee details, include them in payroll calculations, and review amounts in statutory reports.',
    ],
    [
        'q' => 'Does Maz Payroll support EPF?',
        'a' => 'Yes. You can configure EPF settings, capture employee PF/UAN details where applicable, include EPF in payroll calculations, and use the EPF report. The product helps you manage EPF payroll data; it does not file returns to EPFO for you.',
    ],
    [
        'q' => 'Does it support ESI?',
        'a' => 'Yes. Organisation ESI settings, employee ESI details, payroll inclusion, and an ESI report are supported to help you manage ESI payroll amounts.',
    ],
    [
        'q' => 'Does it support Professional Tax?',
        'a' => 'Professional Tax can be enabled at organisation level with slabs and reporting. Availability of PT reporting may depend on your plan or add-ons.',
    ],
    [
        'q' => 'Does it support TDS?',
        'a' => 'Employee PAN is captured and TDS reporting is available in the product. TDS report access may depend on your plan or add-ons. Maz Payroll helps manage TDS payroll data; it does not replace tax-filing software.',
    ],
    [
        'q' => 'Can employees access payslips?',
        'a' => 'Payslips are generated and downloaded as PDF from the admin Payments & Payslips area after payroll is locked and paid. A separate employee self-service portal is not part of the current product.',
    ],
    [
        'q' => 'Can payroll be processed monthly?',
        'a' => 'Yes. Payroll Month and Payroll Runs are designed around monthly pay periods, with attendance, leave, and calculation workflows for each month.',
    ],
    [
        'q' => 'Can salary templates be configured?',
        'a' => 'Yes. Salary structures act as templates that bundle components. You assign a structure and CTC to each employee, with revision history available.',
    ],
];
