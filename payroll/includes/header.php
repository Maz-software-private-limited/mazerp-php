<?php
if (!isset($payroll_seo)) {
    require_once __DIR__ . '/config.php';
}
require_once __DIR__ . '/schema.php';

$payroll_active = payroll_current_page();
$payroll_canonical = payroll_canonical_path($payroll_active);
$payroll_robots = $payroll_seo['robots'] ?? 'index, follow, max-image-preview:large';

$payroll_breadcrumb_labels = [
    'index' => 'Home',
    'features' => 'Features',
    'payroll-management' => 'Payroll Management',
    'employee-management' => 'Employee Management',
    'salary-management' => 'Salary Management',
    'statutory-compliance' => 'Statutory Compliance',
    'payslips' => 'Payslips',
    'payroll-reports' => 'Payroll Reports',
    'pricing' => 'Pricing',
    'faq' => 'FAQ',
    'contact' => 'Contact',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TFSXP9BP1R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TFSXP9BP1R');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($payroll_seo['title']); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($payroll_seo['description']); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($payroll_seo['keywords']); ?>">
<meta name="robots" content="<?php echo htmlspecialchars($payroll_robots); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($payroll_canonical); ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($payroll_seo['title']); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($payroll_seo['description']); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($payroll_seo['og_image']); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($payroll_canonical); ?>">
<meta property="og:site_name" content="<?php echo htmlspecialchars(PAYROLL_SITE_NAME); ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($payroll_seo['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($payroll_seo['description']); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($payroll_seo['og_image']); ?>">

<link rel="icon" type="image/png" href="<?php echo htmlspecialchars(PAYROLL_LOGO_URL); ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="<?php echo htmlspecialchars(PAYROLL_LOCAL_ASSET_BASE); ?>/css/payroll-site.css?v=1.1">

<?php
payroll_print_json_ld(payroll_schema_organization());
if ($payroll_active === 'index') {
    payroll_print_json_ld(payroll_schema_software());
}
if ($payroll_active !== 'index' && $payroll_active !== '404' && isset($payroll_breadcrumb_labels[$payroll_active])) {
    payroll_print_json_ld(payroll_schema_breadcrumb([
        ['name' => 'Maz Payroll', 'url' => PAYROLL_SITE_URL . '/'],
        ['name' => $payroll_breadcrumb_labels[$payroll_active], 'url' => $payroll_canonical],
    ]));
}
if ($payroll_active === 'faq' && !empty($payroll_faq_items)) {
    payroll_print_json_ld(payroll_schema_faq($payroll_faq_items));
}
?>
</head>
<body class="payroll-site">

<nav class="navbar navbar-expand-lg payroll-navbar sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo htmlspecialchars(payroll_url('index')); ?>" aria-label="Maz Payroll home">
      <img src="<?php echo htmlspecialchars(PAYROLL_LOGO_URL); ?>" alt="" height="36" class="payroll-brand-logo" width="96">
      <span class="payroll-brand-text"><strong>Payroll</strong></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#payrollNavbar" aria-controls="payrollNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="payrollNavbar">
      <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
        <?php foreach ($payroll_nav_links as $link): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo payroll_nav_is_active($link['slug']) ? 'active' : ''; ?>" href="<?php echo htmlspecialchars($link['url']); ?>"><?php echo htmlspecialchars($link['label']); ?></a>
        </li>
        <?php endforeach; ?>
        <li class="nav-item dropdown d-none d-xl-block">
          <a class="nav-link dropdown-toggle <?php echo payroll_nav_is_active(['employee-management','salary-management','payslips','payroll-reports']) ? 'active' : ''; ?>" href="<?php echo htmlspecialchars(payroll_url('features')); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
          <ul class="dropdown-menu shadow-sm border-0">
            <?php foreach ($payroll_feature_links as $flink): ?>
              <li><a class="dropdown-item" href="<?php echo htmlspecialchars($flink['url']); ?>"><?php echo htmlspecialchars($flink['label']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>

      <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2 ms-lg-3">
        <a href="<?php echo htmlspecialchars(payroll_url('contact')); ?>" class="btn btn-outline-primary payroll-btn-login px-3">Book a Demo</a>
        <a href="<?php echo htmlspecialchars(PAYROLL_SIGNUP_URL); ?>" class="btn btn-primary payroll-btn-cta px-3">Start Free</a>
      </div>
    </div>
  </div>
</nav>

<main class="payroll-main">
