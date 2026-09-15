<?php
/**
 * Maz Timex microsite config
 */
require_once __DIR__ . '/../../includes/config.php';

if (!defined('TIMEX_SITE_NAME')) {
    define('TIMEX_SITE_NAME', 'Maz Timex');
}
if (!defined('TIMEX_SITE_URL')) {
    define('TIMEX_SITE_URL', rtrim(SITE_URL, '/') . '/timex');
}
if (!defined('TIMEX_SIGNUP_URL')) {
    define('TIMEX_SIGNUP_URL', workspace_signup_url('timex'));
}
if (!defined('TIMEX_LOGIN_URL')) {
    define('TIMEX_LOGIN_URL', 'https://app.mazerp.com/signin?' . http_build_query(['product' => 'timex']));
}
if (!defined('TIMEX_MAIN_SITE_URL')) {
    define('TIMEX_MAIN_SITE_URL', SITE_URL);
}
if (!defined('TIMEX_PAYROLL_URL')) {
    define('TIMEX_PAYROLL_URL', rtrim(SITE_URL, '/') . '/payroll');
}

/**
 * Web path to this microsite (e.g. "/timex") so assets/links work
 * even when the URL has no trailing slash.
 */
if (!function_exists('timex_web_base')) {
    function timex_web_base() {
        static $base = null;
        if ($base !== null) {
            return $base;
        }
        $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
        $timexRoot = realpath(__DIR__ . '/..');
        if ($docRoot && $timexRoot && strpos($timexRoot, $docRoot) === 0) {
            $rel = str_replace('\\', '/', substr($timexRoot, strlen($docRoot)));
            $base = $rel === '' ? '' : $rel;
        } else {
            $base = '/timex';
        }
        return $base;
    }
}

if (!defined('TIMEX_WEB_BASE')) {
    define('TIMEX_WEB_BASE', timex_web_base());
}
if (!defined('TIMEX_LOCAL_ASSET_BASE')) {
    define('TIMEX_LOCAL_ASSET_BASE', TIMEX_WEB_BASE . '/assets');
}
if (!defined('TIMEX_LOGO_URL')) {
    define('TIMEX_LOGO_URL', TIMEX_LOCAL_ASSET_BASE . '/img/logo-timex.png');
}

if (!defined('TIMEX_PLANS_CACHE_TTL')) {
    define('TIMEX_PLANS_CACHE_TTL', 600);
}
if (!defined('TIMEX_PLANS_TIMEOUT')) {
    define('TIMEX_PLANS_TIMEOUT', 5);
}

/** Used only for static fallback plans when the live API is unavailable. */
if (!defined('TIMEX_SHOW_PRICES')) {
    define('TIMEX_SHOW_PRICES', false);
}

if (!function_exists('timex_current_page')) {
    function timex_current_page() {
        $base = basename($_SERVER['PHP_SELF'], '.php');
        return $base !== '' ? $base : 'index';
    }
}

if (!function_exists('timex_url')) {
    function timex_url($page = null) {
        $page = $page ?? timex_current_page();
        $root = TIMEX_WEB_BASE === '' ? '' : TIMEX_WEB_BASE;
        if ($page === 'index' || $page === '' || $page === null) {
            return $root . '/';
        }
        // .php keeps links working on PHP built-in server; Apache .htaccess also serves clean URLs.
        return $root . '/' . $page . '.php';
    }
}

if (!function_exists('timex_canonical_path')) {
    function timex_canonical_path($page = null) {
        $page = $page ?? timex_current_page();
        if ($page === 'index') {
            return TIMEX_SITE_URL . '/';
        }
        return TIMEX_SITE_URL . '/' . $page;
    }
}

if (!function_exists('timex_nav_is_active')) {
    function timex_nav_is_active($slugs) {
        $current = timex_current_page();
        if (!is_array($slugs)) {
            $slugs = [$slugs];
        }
        return in_array($current, $slugs, true);
    }
}

$timex_default_seo = [
    'title'       => 'Workforce Attendance Software | Maz Timex',
    'description' => 'Maz Timex helps growing businesses manage employees, shifts, live attendance, leave, overtime, regularization, and payroll-ready reports from one cloud platform.',
    'keywords'    => 'attendance software, workforce management, biometric alternative QR GPS, leave management software, overtime tracking, Maz Timex',
    'og_image'    => TIMEX_SITE_URL . '/assets/img/logo-timex.png',
    'robots'      => 'index, follow, max-image-preview:large',
];

$timex_page_seo = [
    'index' => [
        'title'       => 'Workforce Attendance Software | Maz Timex',
        'description' => 'Workforce time made clear. Manage employees, shifts, live punch, leave, overtime, and reports—then hand payroll-ready attendance to Maz Payroll.',
    ],
    'features' => [
        'title'       => 'Timex Features | Maz Timex',
        'description' => 'Explore Maz Timex features: employees, shifts, office locations, live attendance, leave, holidays, overtime, regularization, and workforce reports.',
    ],
    'attendance-management' => [
        'title'       => 'Live Attendance Software | Maz Timex',
        'description' => 'Track check-in and check-out with mobile QR and GPS, watch the live board, and finalize day status for payroll-ready attendance.',
    ],
    'employee-management' => [
        'title'       => 'Employee Workforce Management | Maz Timex',
        'description' => 'Organize employees by department, designation, team, manager, shift, and office locations with mobile login for the Employee App.',
    ],
    'shift-management' => [
        'title'       => 'Shift & Office Location Software | Maz Timex',
        'description' => 'Define working hours, weekly offs, grace periods, overtime rules, and geo-fenced office locations for accurate attendance.',
    ],
    'leave-management' => [
        'title'       => 'Leave, OT & Regularization Software | Maz Timex',
        'description' => 'Manage leave policies, holidays, overtime, and attendance regularization with manager and HR approval workflows.',
    ],
    'workforce-reports' => [
        'title'       => 'Workforce Reports Software | Maz Timex',
        'description' => 'Review attendance, hours, leave, overtime, location tracking, and monthly summaries that feed payroll.',
    ],
    'pricing' => [
        'title'       => 'Timex Pricing | Maz Timex',
        'description' => 'One Timex plan with 6- and 12-month savings offers for attendance, leave, overtime, and payroll-ready workforce reports. Start now or book a demo.',
    ],
    'faq' => [
        'title'       => 'Timex FAQ | Maz Timex',
        'description' => 'Answers about attendance punch, shifts, leave, overtime, regularization, reports, and how Maz Timex works with Maz Payroll.',
    ],
    'contact' => [
        'title'       => 'Book a Timex Demo | Contact Maz Timex',
        'description' => 'Request a Maz Timex demo. Share your company details and team size—we will walk you through attendance, leave, and workforce reports.',
    ],
    '404' => [
        'title'       => 'Page Not Found | Maz Timex',
        'description' => 'The page you requested could not be found. Return to Maz Timex home or explore features, pricing, and contact options.',
        'robots'      => 'noindex, follow',
    ],
];

$_timex_page = timex_current_page();
$timex_seo = array_merge($timex_default_seo, $timex_page_seo[$_timex_page] ?? []);

$timex_nav_links = [
    ['label' => 'Home', 'url' => timex_url('index'), 'slug' => 'index'],
    ['label' => 'Features', 'url' => timex_url('features'), 'slug' => 'features'],
    ['label' => 'Attendance', 'url' => timex_url('attendance-management'), 'slug' => 'attendance-management'],
    ['label' => 'Leave & OT', 'url' => timex_url('leave-management'), 'slug' => 'leave-management'],
    ['label' => 'Pricing', 'url' => timex_url('pricing'), 'slug' => 'pricing'],
    ['label' => 'FAQ', 'url' => timex_url('faq'), 'slug' => 'faq'],
];

/** Other Maz products shown in the navbar Products dropdown (after Home). */
$timex_suite_products = [
    [
        'label' => 'Books',
        'url'   => TIMEX_MAIN_SITE_URL . '/',
        'icon'  => 'fa-layer-group',
        'color' => 'blue',
        'desc'  => 'Billing, inventory & operations',
    ],
    [
        'label' => 'CRM',
        'url'   => TIMEX_MAIN_SITE_URL . '/crm/',
        'icon'  => 'fa-users',
        'color' => 'green',
        'desc'  => 'Leads, pipeline & customers',
    ],
    [
        'label' => 'Payroll',
        'url'   => TIMEX_MAIN_SITE_URL . '/payroll/',
        'icon'  => 'fa-money-check-dollar',
        'color' => 'purple',
        'desc'  => 'Salary, payslips & compliance',
    ],
];

$timex_feature_links = [
    ['label' => 'Employee Management', 'url' => timex_url('employee-management')],
    ['label' => 'Shifts & Locations', 'url' => timex_url('shift-management')],
    ['label' => 'Attendance', 'url' => timex_url('attendance-management')],
    ['label' => 'Leave & Overtime', 'url' => timex_url('leave-management')],
    ['label' => 'Reports', 'url' => timex_url('workforce-reports')],
];

$timex_footer_product = [
    ['label' => 'Features', 'url' => timex_url('features')],
    ['label' => 'Attendance Management', 'url' => timex_url('attendance-management')],
    ['label' => 'Employee Management', 'url' => timex_url('employee-management')],
    ['label' => 'Shifts & Locations', 'url' => timex_url('shift-management')],
    ['label' => 'Leave & Overtime', 'url' => timex_url('leave-management')],
    ['label' => 'Workforce Reports', 'url' => timex_url('workforce-reports')],
];

/** Marketing checklist on the pricing page (one plan, everything included). */
$timex_pricing_included = [
    'Employee Management',
    'Attendance & Time Tracking',
    'Leave Management',
    'Workforce Operations',
    'Mobile Employee Access',
    'Reports & Insights',
    'Role-based Access',
    'Secure Cloud Platform',
];

/** Single-plan fallback when the live catalog is unavailable. */
$timex_plans = [
    [
        'key' => 'standard',
        'name' => 'Standard',
        'icon' => 'navy',
        'icon_fa' => 'fa-briefcase',
        'monthly' => '',
        'yearly' => '',
        'popular' => true,
        'trial_enabled' => false,
        'trial_days' => 0,
        'blurb' => 'One plan for workforce time—attendance, leave, overtime, and payroll-ready reports.',
        'commitment_offers' => [
            [
                'months' => 6,
                'total' => 3594,
                'effective_monthly' => 599,
                'name' => '6 Months',
                'blurb' => 'Get started with a flexible 6-month commitment.',
                'cta_label' => 'Choose 6 Months',
                'best_value' => false,
                'currency' => 'INR',
            ],
            [
                'months' => 12,
                'total' => 5988,
                'effective_monthly' => 499,
                'name' => '12 Months',
                'blurb' => 'Save more with our 12-month offer and enjoy Timex for a full year.',
                'cta_label' => 'Choose 12 Months',
                'best_value' => true,
                'currency' => 'INR',
            ],
        ],
        'features' => [
            'Employee roster, departments & teams',
            'Shifts, weekly offs & office geo-fence',
            'Mobile punch (QR + GPS) & live board',
            'Leave, overtime & regularization',
            'Workforce reports & payroll handoff',
            'Approvals, alerts & import/export',
        ],
        'feature_groups' => [
            [
                'category' => 'Time & Attendance',
                'icon' => 'fa-clock',
                'items' => [
                    ['code' => '', 'name' => 'Mobile punch (QR + GPS)', 'description' => 'Employees punch from the Employee App'],
                    ['code' => '', 'name' => 'Live attendance board', 'description' => 'See who is in, late, or still open'],
                    ['code' => '', 'name' => 'Overtime & regularization', 'description' => 'Policies and approval workflows'],
                ],
            ],
            [
                'category' => 'Workforce Ops',
                'icon' => 'fa-users',
                'items' => [
                    ['code' => '', 'name' => 'Employees, shifts & locations', 'description' => 'Organize teams and office sites'],
                    ['code' => '', 'name' => 'Leave & holidays', 'description' => 'Policies, balances, and calendar'],
                    ['code' => '', 'name' => 'Reports & payroll handoff', 'description' => 'Attendance summaries for Maz Payroll'],
                ],
            ],
        ],
        'limits' => [
            ['code' => 'timex_employees', 'name' => 'Employees', 'category' => 'Workforce', 'limit_value' => null, 'is_unlimited' => false, 'unit' => '', 'display' => 'Based on quote', 'sort_order' => 100],
            ['code' => 'multi_user', 'name' => 'Users', 'category' => 'Business', 'limit_value' => null, 'is_unlimited' => false, 'unit' => '', 'display' => 'Based on quote', 'sort_order' => 4],
            ['code' => 'multi_branch', 'name' => 'Branches', 'category' => 'Business', 'limit_value' => null, 'is_unlimited' => false, 'unit' => '', 'display' => 'Based on quote', 'sort_order' => 46],
        ],
        'note' => 'Live catalog prices are temporarily unavailable. Start now or book a demo for current options.',
    ],
];

$timex_faq_items = [
    [
        'q' => 'What is Maz Timex?',
        'a' => 'Maz Timex is the workforce and time workspace. It helps you manage employees, shifts, live attendance, leave, overtime, regularization, and reports. It does not run salary or payslips—that stays in Maz Payroll.',
    ],
    [
        'q' => 'How do employees punch attendance?',
        'a' => 'Employees punch only on the Employee Mobile App. They scan the office QR code and share GPS. Field staff can punch with GPS where policy allows QR to be optional. Portal scan-and-punch is not used.',
    ],
    [
        'q' => 'What day statuses does Timex track?',
        'a' => 'The attendance engine marks Present, Absent, Half day, Leave, Holiday, Weekly off, or On duty. Late and early exit are recorded as minutes on the day, not separate day statuses.',
    ],
    [
        'q' => 'How do shifts and office locations work?',
        'a' => 'Shifts define working hours, weekly offs, grace minutes, and overtime rules. Office locations are geo-fenced sites with QR devices. Employees can be assigned to a shift and one or more locations.',
    ],
    [
        'q' => 'How does leave approval work?',
        'a' => 'Employees apply from mobile. Requests go to the manager, then HR when policy requires it. Approved leave writes the attendance day so punches cannot overwrite it.',
    ],
    [
        'q' => 'Does Timex handle overtime?',
        'a' => 'Yes. Overtime can come from attendance beyond the shift or from employee requests. After manager/HR approval, Timex can mark OT as processed for payroll or compensatory off. Timex does not generate payslips.',
    ],
    [
        'q' => 'What is regularization?',
        'a' => 'When a punch is missing or wrong, employees request a correction from mobile. After approval, Timex updates the attendance day. Types include missing check-in/out, late arrival, early exit, official duty, and more.',
    ],
    [
        'q' => 'How does Timex work with Maz Payroll?',
        'a' => 'Timex owns time. Payroll owns pay. Present days, approved leave, and processed overtime are the handoff—payroll-ready attendance for salary runs in Maz Payroll, not payslips from Timex.',
    ],
    [
        'q' => 'Can HR see who is in right now?',
        'a' => 'Yes. The Live board shows who is in, late, or still open. Supervisors and HR watch live attendance while employees punch from mobile.',
    ],
    [
        'q' => 'Does Timex support holidays?',
        'a' => 'Yes. HR publishes a holiday calendar. A published holiday wins over an auto-absent day when there are no punches.',
    ],
    [
        'q' => 'What reports are available?',
        'a' => 'Timex includes daily attendance, hours, late/early, missing punches, leave, overtime, location tracking, monthly attendance summary, and a dashboard with live workforce KPIs.',
    ],
];
