<?php
/**
 * Maz Timex microsite config
 */
require_once __DIR__ . '/../../includes/config.php';

define('TIMEX_SITE_NAME', 'Maz Timex');
define('TIMEX_SITE_URL', 'https://www.mazerp.com/timex');
define('TIMEX_SIGNUP_URL', 'https://app.mazerp.com/auth/register');
define('TIMEX_LOGIN_URL', 'https://app.mazerp.com/signin');
define('TIMEX_MAIN_SITE_URL', SITE_URL);
define('TIMEX_PAYROLL_URL', 'https://www.mazerp.com/payroll');

/**
 * Web path to this microsite (e.g. "/timex") so assets/links work
 * even when the URL has no trailing slash.
 */
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

define('TIMEX_WEB_BASE', timex_web_base());
define('TIMEX_ASSET_BASE', '../assets');
define('TIMEX_LOCAL_ASSET_BASE', TIMEX_WEB_BASE . '/assets');
define('TIMEX_LOGO_URL', TIMEX_LOCAL_ASSET_BASE . '/img/logo-timex.png');

/**
 * Portal plans API base (no trailing slash).
 * Prod: 'https://api.mazerp.com/v2/portal'
 */
define('TIMEX_PLANS_API_BASE', 'http://localhost:3000/portal');
define('TIMEX_PLANS_CACHE_TTL', 600);
define('TIMEX_PLANS_TIMEOUT', 5);

/** Used only for static fallback plans when the live API is unavailable. */
define('TIMEX_SHOW_PRICES', false);

function timex_current_page() {
    $base = basename($_SERVER['PHP_SELF'], '.php');
    return $base !== '' ? $base : 'index';
}

function timex_url($page = null) {
    $page = $page ?? timex_current_page();
    $root = TIMEX_WEB_BASE === '' ? '' : TIMEX_WEB_BASE;
    if ($page === 'index' || $page === '' || $page === null) {
        return $root . '/';
    }
    // .php keeps links working on PHP built-in server; Apache .htaccess also serves clean URLs.
    return $root . '/' . $page . '.php';
}

function timex_canonical_path($page = null) {
    $page = $page ?? timex_current_page();
    if ($page === 'index') {
        return TIMEX_SITE_URL . '/';
    }
    return TIMEX_SITE_URL . '/' . $page;
}

function timex_nav_is_active($slugs) {
    $current = timex_current_page();
    if (!is_array($slugs)) {
        $slugs = [$slugs];
    }
    return in_array($current, $slugs, true);
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
        'description' => 'Compare Maz Timex workforce plans for startups and growing teams. Start free or book a demo to see employee limits and attendance options.',
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

$timex_plans = [
    [
        'key' => 'basic',
        'name' => 'Basic',
        'icon' => 'blue',
        'icon_fa' => 'fa-seedling',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For small teams starting structured attendance.',
        'features' => [
            'Employee roster & org setup',
            'Shifts & weekly offs',
            'Mobile punch (QR + GPS)',
            'Live attendance board',
            'Leave basics',
            'Core attendance reports',
            'Email support',
        ],
    ],
    [
        'key' => 'standard',
        'name' => 'Standard',
        'icon' => 'navy',
        'icon_fa' => 'fa-briefcase',
        'monthly' => '',
        'yearly' => '',
        'popular' => true,
        'blurb' => 'For growing teams that need leave, OT, and geo-fence depth.',
        'features' => [
            'Everything in Basic',
            'Leave policies & balances',
            'Overtime policies & approval',
            'Regularization workflows',
            'Geo-fenced office locations',
            'Payroll-ready monthly summary',
            'Priority onboarding support',
        ],
        'note' => '*Some capabilities may depend on your plan or add-ons.',
    ],
    [
        'key' => 'professional',
        'name' => 'Professional',
        'icon' => 'slate',
        'icon_fa' => 'fa-building',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For HR teams that need location tracking and richer reporting.',
        'features' => [
            'Everything in Standard',
            'Higher employee limits',
            'Location tracking reports',
            'Advanced workforce reports',
            'Multi-branch office setup',
            'Priority support',
        ],
    ],
    [
        'key' => 'enterprise',
        'name' => 'Enterprise',
        'icon' => 'slate',
        'icon_fa' => 'fa-landmark',
        'monthly' => '',
        'yearly' => '',
        'popular' => false,
        'blurb' => 'For larger organizations that need guided rollout and scale.',
        'features' => [
            'Everything in Professional',
            'Custom employee limits',
            'Guided implementation',
            'Dedicated success check-ins',
            'Custom onboarding walkthrough',
            'Priority support',
        ],
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
