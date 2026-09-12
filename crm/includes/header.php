<?php
if (!isset($crm_seo)) {
    require_once __DIR__ . '/config.php';
}
require_once __DIR__ . '/schema.php';

$crm_active = crm_current_page();
$crm_canonical = crm_canonical_path($crm_active);
$crm_robots = $crm_seo['robots'] ?? 'index, follow, max-image-preview:large';

$crm_breadcrumb_labels = [
    'index' => 'Home',
    'features' => 'Features',
    'sales-pipeline' => 'Sales Pipeline',
    'lead-management' => 'Lead Management',
    'customer-management' => 'Customer Management',
    'follow-ups' => 'Follow-ups',
    'crm-reports' => 'CRM Reports',
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
<title><?php echo htmlspecialchars($crm_seo['title']); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($crm_seo['description']); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($crm_seo['keywords']); ?>">
<meta name="robots" content="<?php echo htmlspecialchars($crm_robots); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($crm_canonical); ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($crm_seo['title']); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($crm_seo['description']); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($crm_seo['og_image']); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($crm_canonical); ?>">
<meta property="og:site_name" content="<?php echo htmlspecialchars(CRM_SITE_NAME); ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($crm_seo['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($crm_seo['description']); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($crm_seo['og_image']); ?>">

<link rel="icon" type="image/png" href="<?php echo htmlspecialchars(CRM_LOGO_URL); ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="<?php echo htmlspecialchars(CRM_LOCAL_ASSET_BASE); ?>/css/crm-site.css?v=3.0">

<?php
crm_print_json_ld(crm_schema_organization());
if ($crm_active === 'index') {
    crm_print_json_ld(crm_schema_software());
}
if ($crm_active !== 'index' && $crm_active !== '404' && isset($crm_breadcrumb_labels[$crm_active])) {
    crm_print_json_ld(crm_schema_breadcrumb([
        ['name' => 'Maz CRM', 'url' => CRM_SITE_URL . '/'],
        ['name' => $crm_breadcrumb_labels[$crm_active], 'url' => $crm_canonical],
    ]));
}
if ($crm_active === 'faq' && !empty($crm_faq_items)) {
    crm_print_json_ld(crm_schema_faq($crm_faq_items));
}
?>
</head>
<body class="crm-site">

<nav class="navbar navbar-expand-lg crm-navbar sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo htmlspecialchars(crm_url('index')); ?>" aria-label="Maz CRM home">
      <img src="<?php echo htmlspecialchars(CRM_LOGO_URL); ?>" alt="" height="36" class="crm-brand-logo" width="96">
      <span class="crm-brand-text"><strong>CRM</strong></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#crmNavbar" aria-controls="crmNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="crmNavbar">
      <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
        <?php foreach ($crm_nav_links as $link): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo crm_nav_is_active($link['slug']) ? 'active' : ''; ?>" href="<?php echo htmlspecialchars($link['url']); ?>"><?php echo htmlspecialchars($link['label']); ?></a>
        </li>
        <?php endforeach; ?>
        <li class="nav-item dropdown d-none d-xl-block">
          <a class="nav-link dropdown-toggle <?php echo crm_nav_is_active(['lead-management','customer-management','crm-reports']) ? 'active' : ''; ?>" href="<?php echo htmlspecialchars(crm_url('features')); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
          <ul class="dropdown-menu shadow-sm border-0">
            <?php foreach ($crm_feature_links as $flink): ?>
              <li><a class="dropdown-item" href="<?php echo htmlspecialchars($flink['url']); ?>"><?php echo htmlspecialchars($flink['label']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>

      <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2 ms-lg-3">
        <a href="<?php echo htmlspecialchars(crm_url('contact')); ?>" class="btn btn-outline-primary crm-btn-login px-3">Book a Demo</a>
        <a href="<?php echo htmlspecialchars(CRM_SIGNUP_URL); ?>" class="btn btn-primary crm-btn-cta px-3">Start Free</a>
      </div>
    </div>
  </div>
</nav>

<main class="crm-main">
