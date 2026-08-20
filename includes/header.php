<?php
if (!isset($seo)) require_once __DIR__ . '/config.php';
$active = current_page();
$is_product_page = in_array($active, $_product_pages);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TFSXP9BP1R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TFSXP9BP1R');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($seo['title']); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($seo['description']); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($seo['keywords']); ?>">
<meta name="robots" content="<?php echo htmlspecialchars($seo['robots'] ?? 'index, follow, max-image-preview:large'); ?>">
<link rel="canonical" href="<?php echo SITE_URL . '/' . ($active === 'index' ? '' : $active . '.php'); ?>">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($seo['title']); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($seo['description']); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($seo['og_image']); ?>">
<meta property="og:url" content="<?php echo SITE_URL . '/' . ($active === 'index' ? '' : $active . '.php'); ?>">
<meta property="og:site_name" content="<?php echo SITE_NAME; ?>">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($seo['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($seo['description']); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($seo['og_image']); ?>">

<link rel="icon" type="image/png" href="<?php echo LOGO_URL; ?>">

<!-- Google Fonts: Outfit + DM Sans -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Site stylesheet -->
<link rel="stylesheet" href="assets/css/style.css?v=2.29">

<!-- Schema: SoftwareApplication -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "MazERP",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "Web, Cloud",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "INR",
    "description": "Free trial available"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "1200"
  },
  "description": "<?php echo htmlspecialchars($seo['description']); ?>",
  "url": "<?php echo SITE_URL; ?>"
}
</script>

<!-- Schema: Organization -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "MAZ Software Solutions",
  "url": "<?php echo SITE_URL; ?>",
  "logo": "<?php echo SITE_URL . '/' . LOGO_URL; ?>",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "<?php echo CONTACT_PHONE; ?>",
    "contactType": "sales",
    "areaServed": "IN"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "2nd floor, Imperial Building, 25G/H2, Swami Nellaiappar High Rd",
    "addressLocality": "Tirunelveli",
    "addressRegion": "Tamil Nadu",
    "postalCode": "627001",
    "addressCountry": "IN"
  }
}
</script>
</head>
<body>

<!-- Top strip -->
<div class="top-strip">
  <div class="container strip-inner">
    <span class="strip-left"><i class="fa-solid fa-bolt"></i> Limited time: Get 1 month free on annual plans. <a href="pricing.php">See pricing</a></span>
    <span class="strip-right"><i class="fa-solid fa-phone"></i> <?php echo CONTACT_PHONE; ?></span>
  </div>
</div>

<!-- Header -->
<header class="site-header" id="siteHeader">
  <div class="container header-inner">

    <!-- Logo -->
    <a href="index.php" class="logo" aria-label="MazERP home">
      <img src="<?php echo LOGO_URL; ?>" alt="MazERP Logo" width="118" height="54">
    </a>

    <!-- Primary navigation (desktop) -->
    <nav class="main-nav" aria-label="Primary">

      <!-- Mobile-only header inside overlay -->
      <div class="nav-mobile-head">
        <a href="index.php" class="logo" aria-label="MazERP home">
          <img src="<?php echo LOGO_URL; ?>" alt="MazERP" width="118" height="54">
        </a>
        <button class="nav-close" aria-label="Close menu">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <ul class="nav-menu" id="navMenu">

        <?php foreach ($nav_items as $key => $item): ?>
          <?php if (!empty($item['dropdown'])): ?>
            <?php
              // "Products" parent is active when on any product sub-page
              $parent_active = $is_product_page ? 'active' : '';
            ?>
            <li class="has-dropdown <?php echo $parent_active; ?>">
              <a href="#" aria-haspopup="true" aria-expanded="false">
                <?php echo $item['label']; ?> <i class="fa-solid fa-chevron-down"></i>
              </a>
              <div class="dropdown-menu" role="menu">
                <?php
                  $_dm_color_map = ['erp' => 'blue', 'crm' => 'green', 'accounting' => 'amber'];
                  foreach ($products_nav as $prod_key => $prod):
                    $_dm_color = $_dm_color_map[$prod_key] ?? 'blue';
                ?>
                <a href="<?php echo htmlspecialchars($prod['url']); ?>"
                   role="menuitem"
                   class="<?php echo $active === $prod_key ? 'active' : ''; ?>">
                  <span class="dm-icon <?php echo $_dm_color; ?>">
                    <i class="fa-solid <?php echo htmlspecialchars($prod['icon']); ?>"></i>
                  </span>
                  <span class="dm-text">
                    <span class="dm-label"><?php echo htmlspecialchars($prod['label']); ?></span>
                    <span class="dm-desc"><?php echo htmlspecialchars($prod['desc']); ?></span>
                  </span>
                </a>
                <?php endforeach; ?>
              </div>
            </li>
          <?php else: ?>
            <li>
              <a href="<?php echo htmlspecialchars($item['url']); ?>"
                 class="<?php echo $active === $key ? 'active' : ''; ?>">
                <?php echo $item['label']; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>

        <!-- Country Selector Dropdown -->
        <li class="has-dropdown country-selector-item">
          <a href="#" aria-haspopup="true" aria-expanded="false">
            <span style="margin-right: 6px;"><?php echo $loc['country_flag']; ?></span><?php echo htmlspecialchars($loc['country_label']); ?> <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem; margin-left: 4px;"></i>
          </a>
          <div class="dropdown-menu" role="menu" style="min-width: 180px;">
            <?php foreach ($loc_data as $code => $data): ?>
            <a href="?country=<?php echo $code; ?>" role="menuitem" class="<?php echo $country === $code ? 'active' : ''; ?>" style="display: flex; align-items: center; gap: 10px; padding: 10px 12px; text-decoration: none;">
              <span class="country-flag" style="font-size: 1.2rem;"><?php echo $data['country_flag']; ?></span>
              <span class="dm-label" style="font-weight: 500; font-size: 0.9rem;"><?php echo htmlspecialchars($data['country_label']); ?></span>
            </a>
            <?php endforeach; ?>
          </div>
        </li>

        <!-- Mobile-only CTAs -->
        <li class="nav-cta-wrap">
          <a href="https://app.mazerp.com/signin" class="btn btn-ghost btn-lg nav-cta-signin">Sign In</a>
          <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg">Start Free Trial</a>
        </li>

      </ul>
    </nav>

    <!-- Desktop CTAs -->
    <div class="header-actions">
      <a href="https://app.mazerp.com/signin" class="btn btn-ghost btn-sm">Sign In</a>
      <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-sm">Start Free Trial</a>
    </div>

    <!-- Hamburger (mobile) — placed last so it can be flex-ordered to the right -->
    <button class="hamburger" id="hamburger" aria-expanded="false" aria-controls="navMenu" aria-label="Toggle navigation">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>

<!-- Mobile nav backdrop (outside header to escape stacking context) -->
<div class="nav-backdrop" id="navBackdrop" aria-hidden="true"></div>
