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
        'pricing_basic_annual' => '₹990',
        'pricing_basic_annual_orig' => '₹1100',
        'pricing_std_annual' => '₹3,299',
        'pricing_std_annual_orig' => '₹3,600',
        'pricing_prof_annual' => '₹6,599',
        'pricing_prof_annual_orig' => '₹7,200',
        'pricing_prem_annual' => '₹10,999',
        'pricing_prem_annual_orig' => '₹12,000',
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
        'pricing_basic_annual' => '$99',
        'pricing_basic_annual_orig' => '$110',
        'pricing_std_annual' => '$329',
        'pricing_std_annual_orig' => '$360',
        'pricing_prof_annual' => '$659',
        'pricing_prof_annual_orig' => '$720',
        'pricing_prem_annual' => '$1,099',
        'pricing_prem_annual_orig' => '$1,200',
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
        'pricing_basic_annual' => 'AED 390',
        'pricing_basic_annual_orig' => 'AED 440',
        'pricing_std_annual' => 'AED 1,199',
        'pricing_std_annual_orig' => 'AED 1,320',
        'pricing_prof_annual' => 'AED 2,399',
        'pricing_prof_annual_orig' => 'AED 2,640',
        'pricing_prem_annual' => 'AED 3,999',
        'pricing_prem_annual_orig' => 'AED 4,400',
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
    'smtp_secure'   => 'ssl',
    'smtp_user'     => 'support@maztechno.com',
    'smtp_pass'     => '',
    'from_email'    => 'support@maztechno.com',
    'from_name'     => 'Maztechno',
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
define('EMAIL_LOGO_CID', 'mazerp-logo');
define('EMAIL_LOGO_PATH', __DIR__ . '/../assets/img/logo.png');

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
    'terms-of-service' => [
        'title'       => 'Terms of Service | MazERP',
        'description'  => 'Terms of Service for MazERP cloud ERP, CRM, and accounting software by MAZ Software Solutions.',
    ],
    'privacy-policy' => [
        'title'       => 'Privacy Policy | MazERP',
        'description'  => 'How MazERP and MAZ Software Solutions collect, use, and protect personal data on our website and cloud ERP platform.',
    ],
    'blog' => [
        'title'       => 'MazERP Blog | Business Insights, GST, Billing & Inventory Tips',
        'description'  => 'Read the latest articles from the MazERP team. Get professional advice on GST compliance, retail billing, stock tracking, and growing your business in India.',
        'og_image'     => SITE_URL . '/assets/img/blog-inventory-management.jpg',
    ],
    'blog-how-erp-software-prevents-stock-loss' => [
        'title'       => 'How ERP Software Prevents Stock Loss | Inventory Management Guide | Maz ERP',
        'description'  => 'Discover how Maz ERP software prevents stock loss with real-time inventory tracking, stock alerts, and smart inventory management. Grow your business with Maz ERP.',
        'keywords'     => 'stock loss, inventory management software, stock tracking, barcode inventory, low stock alerts, warehouse management',
        'og_image'     => SITE_URL . '/assets/img/blog-prevent-stock-loss.jpg',
    ],
    'blog-why-inventory-management-is-essential' => [
        'title'       => 'Why Inventory Management Is Essential for Growing Businesses in India | Maz ERP',
        'description'  => 'Learn why inventory management is essential for growing businesses. Discover how inventory management software helps improve stock control, reduce losses, increase profits, and streamline operations across India.',
        'keywords'     => 'Inventory Management Software, stock tracking, ERP India, GST billing software, inventory control, warehouse management',
        'og_image'     => SITE_URL . '/assets/img/blog-inventory-management.jpg',
    ],
    'blog-5-common-gst-invoicing-mistakes' => [
        'title'       => '5 Common GST Invoicing Mistakes Indian Businesses Make | MazERP',
        'description'  => 'Avoid expensive tax penalties and mismatches. Discover the top 5 GST invoicing errors Indian retailers and wholesalers make and how to format CGST, SGST, and IGST invoices.',
        'keywords'     => 'GST invoicing mistakes, CGST SGST IGST invoice format, GST billing software India, tax invoice compliance, GST audit errors',
        'og_image'     => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1200&h=675&fit=crop&q=80',
    ],
    'blog-how-cloud-erp-helps-manage-multiple-stores' => [
        'title'       => 'Manage Multiple Retail Stores Remotely with Cloud ERP | MazERP',
        'description'  => 'Find out how cloud-based ERP software helps Indian retail owners track sales, manage inventory transfers, and monitor cashier shifts across branches remotely.',
        'keywords'     => 'multi-store ERP, remote retail management, retail billing software, warehouse stock transfer, cloud POS India',
        'og_image'     => 'https://images.unsplash.com/photo-1563013544-824ae1d704d3?w=1200&h=675&fit=crop&q=80',
    ],
    'blog-how-erp-simplifies-accounting' => [
        'title'       => 'How ERP Simplifies Accounting for Indian Businesses | MAZ ERP',
        'description'  => 'Discover how ERP software simplifies accounting with automated billing, GST compliance, inventory management, and real-time financial reporting for Indian businesses.',
        'keywords'     => 'How ERP Simplifies Accounting, ERP Software, ERP Software for Indian Businesses, Accounting ERP Software, GST Billing Software, Business Accounting Software, ERP Accounting Software',
        'og_image'     => SITE_URL . '/assets/img/blog-how-erp-simplifies-accounting.jpg',
    ],
    'blog-tally-vs-cloud-erp-comparison' => [
        'title'       => 'Tally vs. Cloud ERP: Why Indian SMEs Are Making the Switch | MazERP',
        'description'  => 'Discover why growing Indian SMEs are migrating from offline desktop tools like Tally to modern, integrated cloud ERP systems for multi-branch sync and real-time books.',
        'keywords'     => 'Tally vs Cloud ERP, ERP Software India, cloud ERP SaaS, Tally alternative, SME business software',
        'og_image'     => SITE_URL . '/assets/img/blog-tally-vs-cloud-erp-comparison.jpg',
    ],
    'blog-gstr-reconciliation-automation' => [
        'title'       => 'How to Automate GST Reconciliations (GSTR-2B) Using ERP | MazERP',
        'description'  => 'Say goodbye to mismatch penalties. Learn how integrating ERP software automates GSTR-2B purchase reconciliations and simplifies GST invoicing in India.',
        'keywords'     => 'GSTR Reconciliation Automation, GSTR-2B reconciliation, Input Tax Credit, GST compliance India, GST billing software',
        'og_image'     => SITE_URL . '/assets/img/blog-gstr-reconciliation-automation.jpg',
    ],
    'blog-crm-for-indian-wholesalers' => [
        'title'       => 'Boosting B2B Sales: The Role of CRM for Indian Wholesalers | MazERP',
        'description'  => 'Discover how CRM integration helps Indian B2B wholesalers manage sales pipelines, track customer purchase histories, and streamline payment collection.',
        'keywords'     => 'CRM for Indian Wholesalers, B2B wholesale CRM, outstanding collections, client pipeline management, credit control limits',
        'og_image'     => SITE_URL . '/assets/img/blog-crm-for-indian-wholesalers.jpg',
    ],
    'blog-barcode-billing-software-benefits' => [
        'title'       => 'How Barcode Billing Software Speeds Up Supermarket Checkouts | MazERP',
        'description'  => 'Speed up transaction times and eliminate queue bottlenecks at retail counters using barcode inventory scanners integrated with cloud billing systems.',
        'keywords'     => 'Barcode Billing Software, POS retail counter, barcode scanner checkout, retail billing software, UPI QR payment integration',
        'og_image'     => SITE_URL . '/assets/img/blog-barcode-billing-software-benefits.jpg',
    ],
    'blog-ecommerce-warehouse-management-best-practices' => [
        'title'       => 'E-commerce Warehouse Management: 5 Best Practices | MazERP',
        'description'  => 'Learn the top warehouse management strategies for Indian e-commerce brands, from barcode product routing to automated stock transfer orders.',
        'keywords'     => 'Warehouse Management in E-commerce, warehouse bin locations, barcode picking verification, inventory sync marketplaces, reorder alerts',
        'og_image'     => SITE_URL . '/assets/img/blog-ecommerce-warehouse-management-best-practices.jpg',
    ],
    'blog-understanding-retail-analytics' => [
        'title'       => '3 Critical Retail Analytics Reports to Run Weekly | MazERP',
        'description'  => 'Maximize your shop profits. Learn about the 3 retail analytics reports to track weekly: sales by item, customer behavior, and supplier lead times.',
        'keywords'     => 'retail analytics, weekly sales reports, inventory turnover, customer purchase history, retail business intelligence',
        'og_image'     => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&h=675&fit=crop&q=80',
    ],
];

$_page = current_page();
$seo = array_merge($default_seo, $page_seo[$_page] ?? []);

// Product pages — used to set the "Products" parent nav item as active
$_product_pages = ['erp', 'crm', 'accounting'];

$nav_items = [
    'index'     => ['label' => 'Home',      'url' => 'index.php'],
    'products'  => ['label' => 'Products',  'url' => '#',         'dropdown' => true],
    'features'  => ['label' => 'Features',  'url' => 'features.php'],
    'solutions' => ['label' => 'Solutions', 'url' => 'solutions.php'],
    'pricing'   => ['label' => 'Pricing',   'url' => 'pricing.php'],
    'about'     => ['label' => 'About',     'url' => 'about.php'],
    'blog'      => ['label' => 'Blog',      'url' => 'blog.php'],
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
];
