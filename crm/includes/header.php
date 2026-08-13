<?php
if (!isset($crm_seo)) {
    require_once __DIR__ . '/config.php';
}
$crm_active = crm_current_page();
$crm_canonical = crm_canonical_path($crm_active);
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
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="<?php echo htmlspecialchars($crm_canonical); ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($crm_seo['title']); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($crm_seo['description']); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($crm_seo['og_image']); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($crm_canonical); ?>">
<meta property="og:site_name" content="<?php echo htmlspecialchars(CRM_SITE_NAME); ?>">

<link rel="icon" type="image/png" href="<?php echo CRM_LOGO_URL; ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="<?php echo CRM_LOCAL_ASSET_BASE; ?>/css/crm-site.css?v=2.0">

<?php if ($crm_active === 'index'): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Maz CRM",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "Web, Cloud",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR", "description": "Free trial available" },
  "description": <?php echo json_encode($crm_seo['description']); ?>,
  "url": <?php echo json_encode(CRM_SITE_URL . '/'); ?>
}
</script>
<?php endif; ?>
</head>
<body class="crm-site">

<nav class="navbar navbar-expand-lg crm-navbar sticky-top bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php" aria-label="Maz CRM home">
      <img src="<?php echo CRM_LOGO_URL; ?>" alt="Maz CRM" height="44" class="crm-brand-logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#crmNavbar" aria-controls="crmNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="crmNavbar">
      <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo $crm_active === 'features' ? 'active' : ''; ?>" href="features.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Features</a>
          <ul class="dropdown-menu shadow-sm border-0">
            <?php foreach ($crm_feature_links as $link): ?>
              <li><a class="dropdown-item" href="<?php echo htmlspecialchars($link['url']); ?>"><?php echo htmlspecialchars($link['label']); ?></a></li>
            <?php endforeach; ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-semibold" href="features.php">All features</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo $crm_active === 'solutions' ? 'active' : ''; ?>" href="solutions.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Solutions</a>
          <ul class="dropdown-menu shadow-sm border-0">
            <?php foreach ($crm_solution_links as $link): ?>
              <li><a class="dropdown-item" href="<?php echo htmlspecialchars($link['url']); ?>"><?php echo htmlspecialchars($link['label']); ?></a></li>
            <?php endforeach; ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-semibold" href="solutions.php">All solutions</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $crm_active === 'pricing' ? 'active' : ''; ?>" href="pricing.php">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
          <ul class="dropdown-menu shadow-sm border-0">
            <?php foreach ($crm_resource_links as $link): ?>
              <li><a class="dropdown-item" href="<?php echo htmlspecialchars($link['url']); ?>"><?php echo htmlspecialchars($link['label']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $crm_active === 'about' ? 'active' : ''; ?>" href="about.php">About Us</a>
        </li>
      </ul>

      <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2 ms-lg-3">
        <div class="dropdown">
          <button class="btn btn-link crm-lang-btn dropdown-toggle text-decoration-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-globe me-1"></i> English
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
            <li><a class="dropdown-item active" href="?country=IN">English (India)</a></li>
            <li><a class="dropdown-item" href="?country=US">English (US)</a></li>
            <li><a class="dropdown-item" href="?country=AE">English (UAE)</a></li>
          </ul>
        </div>
        <a href="login.php" class="btn btn-outline-primary crm-btn-login px-3">Login</a>
        <a href="signup.php" class="btn btn-primary crm-btn-cta px-3">Get Started</a>
      </div>
    </div>
  </div>
</nav>

<main class="crm-main">
