<?php

declare(strict_types=1);

/** @var string $homeSection */
/** @var array{file: string, title: string, description?: string, cta_band?: bool} $sectionMeta */

$navLabel = match ($homeSection) {
    'how-it-works' => 'How it works',
    'faq' => 'FAQ',
    default => ucfirst(str_replace('-', ' ', $homeSection)),
};
?>
<header class="section-page-intro container">
  <nav class="section-page-intro__crumb" aria-label="Breadcrumb">
    <a href="<?= e(route_url('')) ?>">Home</a>
    <span aria-hidden="true">/</span>
    <span><?= e($navLabel) ?></span>
  </nav>
  <?php if (!empty($sectionMeta['description'])): ?>
    <p class="section-page-intro__lead"><?= e((string) $sectionMeta['description']) ?></p>
  <?php endif; ?>
</header>
