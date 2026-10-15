<?php

declare(strict_types=1);

/** @var string $pageTitle */
/** @var string|null $pageDescription */
/** @var string|null $pageCanonicalPath */
/** @var string|null $pageOgType */
/** @var bool|null $pageNoindex */

$c = site_config();
$theme = active_theme();
$themeId = active_theme_id();
$seo = $c['seo'] ?? [];
$brandSuffix = ' · ' . $c['site_name'];
$title = isset($pageTitle) ? $pageTitle . $brandSuffix : $c['site_name'];
$description = seo_meta_description($pageDescription ?? $c['meta_description']);
$canonicalPath = $pageCanonicalPath ?? basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
if ($canonicalPath === '/' || $canonicalPath === 'index.php' || $canonicalPath === '') {
    $canonical = absolute_url('');
} else {
    $canonical = absolute_url(internal_path_to_pretty($canonicalPath) === '' ? '' : $canonicalPath);
}
$ogType = $pageOgType ?? 'website';
$ogImage = absolute_url($seo['og_image'] ?? site_logo_path());
$noindex = !empty($pageNoindex);
?>
<!DOCTYPE html>
<html lang="en-IN" data-theme="<?= e($themeId) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <?php if ($noindex): ?>
  <meta name="robots" content="noindex, nofollow">
  <?php else: ?>
  <meta name="robots" content="index, follow, max-image-preview:large">
  <?php endif; ?>
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta name="theme-color" content="<?= e((string) ($theme['theme_color'] ?? '#1e293b')) ?>">
  <meta property="og:type" content="<?= e($ogType) ?>">
  <meta property="og:site_name" content="<?= e($c['site_name']) ?>">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <meta property="og:locale" content="en_IN">
  <meta name="twitter:card" content="<?= e($seo['twitter_card'] ?? 'summary_large_image') ?>">
  <meta name="twitter:title" content="<?= e($title) ?>">
  <meta name="twitter:description" content="<?= e($description) ?>">
  <meta name="twitter:image" content="<?= e($ogImage) ?>">
  <link rel="icon" href="<?= e(asset_url('assets/img/favicon.ico')) ?>" sizes="any">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="<?= e(asset_url('assets/css/main.css')) ?>" as="style">
  <link href="<?= e((string) ($theme['fonts'] ?? '')) ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= e(asset_url('assets/css/main.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset_url((string) ($theme['css'] ?? 'assets/css/themes/payroll.css'))) ?>">
  <?php
  require_once __DIR__ . '/structured-data.php';

  if (!isset($pageJsonLd) && is_current_page('index.php')) {
      $pageJsonLd = schema_graph([
          schema_organization(),
          schema_web_site(),
          schema_software_application(),
          schema_faq_page($c['faq']),
      ]);
  }

  if (isset($pageJsonLd) && $pageJsonLd !== null) {
      render_json_ld($pageJsonLd);
  }
  ?>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
