<?php
/**
 * MazERP v2 - Global Configuration
 * Site metadata, navigation, contact details, per-page SEO
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['country'])) {
    $c = strtoupper(trim($_GET['country']));
    if (in_array($c, ['IN', 'US', 'AE'])) {
        $_SESSION['country'] = $c;
        setcookie('maz_country', $c, time() + (86400 * 30), '/');
    }
}
$country = isset($_SESSION['country']) ? $_SESSION['country'] : (isset($_COOKIE['maz_country']) ? $_COOKIE['maz_country'] : 'IN');
if (!in_array($country, ['IN', 'US', 'AE'])) {
    $country = 'IN';
}

$loc_data = [
    'IN' => [
        'country_label' => 'India',
        'country_flag' => '🇮🇳',
        'currency_symbol' => '₹',
        'tax_name' => 'GST',
        'tax_desc' => 'GST compliance, e-invoicing, and GSTR summaries',
        'tax_desc_long' => 'Automatic CGST, SGST, and IGST calculation on every invoice. Stay compliant with every transaction.',
        'pricing_basic' => '₹90',
        'pricing_basic_orig' => '₹200',
        'pricing_std' => '₹299',
        'pricing_std_orig' => '₹500',
        'pricing_prof' => '₹599',
        'pricing_prof_orig' => '₹700',
        'pricing_prem' => '₹999',
        'pricing_prem_orig' => '₹1200',
        'payroll_title' => 'Payroll & Compliance',
        'payroll_desc' => 'PF, ESI & Professional Tax',
        'payroll_feat1' => 'Automated salary structures & processing',
        'payroll_feat2' => 'Integrated attendance & leave tracking',
        'payroll_feat3' => 'PF, ESI, and Professional Tax compliance',
        'payroll_feat4' => 'One-click direct salary bank transfers',
        'payroll_feat5' => 'Employee self-service portal & payslips',
        'payroll_feat6' => 'Comprehensive payroll cost & analytics reports',
        'solutions_tax' => 'GST-compliant billing',
        'solutions_tax_desc' => 'Auto CGST/SGST/IGST splits',
        'accounting_tax_desc' => 'GST returns prepared automatically every month',
        'erp_tax_desc' => 'Auto CGST/SGST/IGST calculation'
    ],
    'US' => [
        'country_label' => 'USA',
        'country_flag' => '🇺🇸',
        'currency_symbol' => '$',
        'tax_name' => 'Sales Tax',
        'tax_desc' => 'State-by-state sales tax calculations and IRS compliance',
        'tax_desc_long' => 'Automatic state, county, and city sales tax calculation on every invoice. Stay compliant with every sale.',
        'pricing_basic' => '$9',
        'pricing_basic_orig' => '$20',
        'pricing_std' => '$29',
        'pricing_std_orig' => '$50',
        'pricing_prof' => '$59',
        'pricing_prof_orig' => '$70',
        'pricing_prem' => '$99',
        'pricing_prem_orig' => '$120',
        'payroll_title' => 'Payroll & Tax Filings',
        'payroll_desc' => 'FICA, W-2, 1099 Compliance',
        'payroll_feat1' => 'Automated salary, hourly, and contract pay',
        'payroll_feat2' => 'Integrated timecard & vacation tracking',
        'payroll_feat3' => 'FICA, Federal, and State tax filings',
        'payroll_feat4' => 'One-click Direct Deposit & pay cards',
        'payroll_feat5' => 'Employee portal for W-2s & paystub downloads',
        'payroll_feat6' => 'Comprehensive labor cost & IRS compliance reports',
        'solutions_tax' => 'Sales Tax billing',
        'solutions_tax_desc' => 'Automated state and city tax splits',
        'accounting_tax_desc' => 'IRS 1099-NEC & state tax prep automatically',
        'erp_tax_desc' => 'Auto State & City Sales Tax calculation'
    ],
    'AE' => [
        'country_label' => 'Dubai (UAE)',
        'country_flag' => '🇦🇪',
        'currency_symbol' => 'AED ',
        'tax_name' => 'VAT',
        'tax_desc' => 'FTA-compliant VAT calculations and Audit File generation',
        'tax_desc_long' => 'Automatic 5% UAE VAT calculation on every tax invoice. Fully FTA-compliant invoicing.',
        'pricing_basic' => 'AED 39',
        'pricing_basic_orig' => 'AED 80',
        'pricing_std' => 'AED 119',
        'pricing_std_orig' => 'AED 200',
        'pricing_prof' => 'AED 239',
        'pricing_prof_orig' => 'AED 300',
        'pricing_prem' => 'AED 399',
        'pricing_prem_orig' => 'AED 500',
        'payroll_title' => 'WPS & UAE Payroll',
        'payroll_desc' => 'WPS & Gratuity Compliance',
        'payroll_feat1' => 'Automated salary processing & WPS structures',
        'payroll_feat2' => 'Integrated attendance & shift tracking',
        'payroll_feat3' => 'WPS (Wage Protection System) file generation',
        'payroll_feat4' => 'End-of-service gratuity & indemnity calculations',
        'payroll_feat5' => 'Employee self-service portal & digital payslips',
        'payroll_feat6' => 'Comprehensive UAE labor law compliance reports',
        'solutions_tax' => 'FTA-compliant VAT billing',
        'solutions_tax_desc' => 'Auto 5% VAT splits and reports',
        'accounting_tax_desc' => 'FTA VAT returns prepared automatically every month',
        'erp_tax_desc' => 'Auto FTA VAT calculation & invoices'
    ]
];

$loc = $loc_data[$country];


define('SITE_NAME', 'MazERP');
define('SITE_TAGLINE', 'One Stop Software Solution for All Your Business Needs');
define('SITE_URL', 'https://www.mazerp.com');
define('CONTACT_EMAIL', 'info@maztechno.com');
define('CONTACT_PHONE', '+91 81100 87700');

$mail_config = [
    'smtp_host'     => 'smtp.hostinger.com',
    'smtp_port'     => 465,
    'smtp_secure'   => 'tls',
    'smtp_user'     => 'support@maztechno.com',
    'smtp_pass'     => '',
    'from_email'    => CONTACT_EMAIL,
    'from_name'     => SITE_NAME . ' Website',
    'test_mail_key' => 'Maz@2024',
];
$mail_config_file = __DIR__ . '/mail-config.local.php';
if (is_file($mail_config_file)) {
    $local = require $mail_config_file;
    if (is_array($local)) {
        $mail_config = array_merge($mail_config, $local);
    }
}
define('WHATSAPP_NUMBER', '918110087700');
define('LOGO_URL', 'assets/img/logo.png');
define('LOGO_ALT_URL', 'assets/img/logo.png');

function current_page() {
    return basename($_SERVER['PHP_SELF'], '.php') ?: 'index';
}

$default_seo = [
    'title'       => 'MazERP - One Stop Software Solution | ERP, CRM, Billing & Accounting',
    'description'  => 'MazERP is the one stop software solution for Indian businesses. GST billing, accounting, inventory, CRM, and ERP in one cloud platform. Start your free trial today.',
    'keywords'     => 'ERP software India, GST billing software, accounting software, CRM software, inventory management, cloud ERP SaaS, billing software India',
    'og_image'     => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80',
];

$page_seo = [
    'index' => [
        'title'       => 'MazERP - One Stop Software Solution | GST Billing, ERP, CRM & Accounting',
        'description'  => 'Replace scattered tools with one powerful platform. MazERP handles GST billing, inventory, accounting, CRM, and business management. Start free today.',
    ],
    'features' => [
        'title'       => 'Features - Inventory, Billing, Reports, CRM, Multi-Store | MazERP',
        'description'  => 'Explore MazERP features: smart inventory management, GST billing and invoicing, real-time reports, customer management, and multi-store support.',
    ],
    'solutions' => [
        'title'       => 'Solutions for Retail, Restaurants, Supermarkets, Pharmacies | MazERP',
        'description'  => 'Industry-specific billing and ERP solutions for retail stores, restaurants, supermarkets, pharmacies, and hardware shops. See how MazERP fits your business.',
    ],
    'about' => [
        'title'       => 'About MazERP | Our Story, Mission & Why 10,000+ Businesses Trust Us',
        'description'  => 'MazERP helps growing businesses simplify GST billing, accounting, and operations. Learn our story and why over 10,000 businesses choose MazERP.',
    ],
    'contact' => [
        'title'       => 'Contact MazERP | Book a Demo or Start Your Free Trial',
        'description'  => 'Get in touch with MazERP. Book a personalized demo, start your free trial, or talk to our team for honest answers and zero-pressure pricing.',
    ],
    'pricing' => [
        'title'       => 'Pricing Plans | Affordable GST Billing & ERP Software | MazERP',
        'description'  => 'Transparent, affordable pricing for MazERP. Choose the plan that fits your business. No hidden fees, free trial, cancel anytime.',
    ],
    'erp' => [
        'title'       => 'ERP Software | Inventory, Billing & Operations Management | MazERP',
        'description'  => 'MazERP\'s ERP module covers end-to-end inventory, billing, purchase orders, and operations management for growing Indian businesses. Start your free trial.',
        'keywords'     => 'ERP software India, inventory management software, billing software, operations management, cloud ERP India',
    ],
    'crm' => [
        'title'       => 'CRM Software | Customer & Sales Pipeline Management | MazERP',
        'description'  => 'Manage customers, track leads, and grow your sales pipeline with MazERP CRM. Built for Indian businesses. Try free today.',
        'keywords'     => 'CRM software India, customer management, sales pipeline, lead tracking, cloud CRM India',
    ],
    'accounting' => [
        'title'       => 'Accounting Software | GST, Finance & Reports | MazERP',
        'description'  => 'Automated GST accounting, financial reports, and compliance tools built for Indian businesses. MazERP Accounting makes finance simple. Start free.',
        'keywords'     => 'accounting software India, GST accounting, financial reports, tally alternative, cloud accounting India',
    ],
    'payroll' => [
        'title'       => 'Payroll Software | Salary, Attendance & PF/ESI Management | MazERP',
        'description'  => 'Automate payroll processing, track attendance, manage PF, ESI, and salary disbursements with MazERP Payroll. Start your 7-day free trial.',
        'keywords'     => 'payroll software India, salary processing, attendance tracker, PF ESI compliance, employee management software',
    ],
];

$_page = current_page();
$seo = array_merge($default_seo, $page_seo[$_page] ?? []);

// Product pages — used to set the "Products" parent nav item as active
$_product_pages = ['erp', 'crm', 'accounting', 'payroll'];

$nav_items = [
    'index'     => ['label' => 'Home',      'url' => 'index.php'],
    'products'  => ['label' => 'Products',  'url' => '#',         'dropdown' => true],
    'features'  => ['label' => 'Features',  'url' => 'features.php'],
    'solutions' => ['label' => 'Solutions', 'url' => 'solutions.php'],
    'pricing'   => ['label' => 'Pricing',   'url' => 'pricing.php'],
    'about'     => ['label' => 'About',     'url' => 'about.php'],
    'contact'   => ['label' => 'Contact',   'url' => 'contact.php'],
];

$products_nav = [
    'erp' => [
        'label' => 'ERP',
        'url'   => 'erp.php',
        'icon'  => 'fa-layer-group',
        'desc'  => 'Inventory, billing & operations',
    ],
    'crm' => [
        'label' => 'CRM',
        'url'   => 'crm.php',
        'icon'  => 'fa-users',
        'desc'  => 'Customers & sales pipeline',
    ],
    'accounting' => [
        'label' => 'Accounting',
        'url'   => 'accounting.php',
        'icon'  => 'fa-calculator',
        'desc'  => 'Finance, GST & reports',
    ],
    'payroll' => [
        'label' => 'Payroll',
        'url'   => 'payroll.php',
        'icon'  => 'fa-wallet',
        'desc'  => 'Salary, attendance & PF/ESI',
    ],
];
