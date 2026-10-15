<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require __DIR__ . '/includes/bootstrap.php';

$homeSection = crm_current_home_section();
$sectionMeta = $homeSection !== '' ? crm_home_section_meta($homeSection) : null;
$isSectionPage = $sectionMeta !== null;

if ($isSectionPage) {
    $pageTitle = (string) $sectionMeta['title'];
    $pageDescription = (string) ($sectionMeta['description'] ?? site_config()['meta_description']);
    $pageCanonicalPath = $homeSection;
} else {
    $pageTitle = 'CRM software for sales teams';
    $pageDescription = site_config()['meta_description'];
    $pageCanonicalPath = '';
}

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="<?= $isSectionPage ? 'crm-main--section' : '' ?>">
  <?php if ($isSectionPage): ?>
    <?php require __DIR__ . '/includes/sections/' . $sectionMeta['file']; ?>
    <?php if (!empty($sectionMeta['cta_band'])): ?>
      <?php require __DIR__ . '/includes/sections/cta-band.php'; ?>
    <?php endif; ?>
  <?php else: ?>
    <?php
    require __DIR__ . '/includes/sections/hero.php';
    require __DIR__ . '/includes/sections/why.php';
    require __DIR__ . '/includes/sections/features.php';
    require __DIR__ . '/includes/sections/how-it-works.php';
    require __DIR__ . '/includes/sections/pipeline.php';
    require __DIR__ . '/includes/sections/follow-ups.php';
    require __DIR__ . '/includes/sections/preview.php';
    require __DIR__ . '/includes/sections/security.php';
    require __DIR__ . '/includes/sections/pricing.php';
    require __DIR__ . '/includes/sections/faq.php';
    require __DIR__ . '/includes/sections/cta-band.php';
    require __DIR__ . '/includes/sections/contact.php';
    ?>
  <?php endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
