<?php

declare(strict_types=1);

/** @var string $homeSection */
/** @var array{file: string, title: string, description?: string, cta_band?: bool} $sectionMeta */

$navLabel = match ($homeSection) {
    'how-it-works' => 'How it works',
    'follow-ups' => 'Follow-ups',
    'why' => 'Why Maz CRM',
    'faq' => 'FAQ',
    'preview' => 'Product preview',
    default => ucfirst(str_replace('-', ' ', $homeSection)),
};
?>
<header class="crm-section-intro crm-wrap">
  <nav class="crm-section-intro__crumb" aria-label="Breadcrumb">
    <a href="<?= e(route_url('')) ?>">Home</a>
    <span aria-hidden="true">/</span>
    <span aria-current="page"><?= e($navLabel) ?></span>
  </nav>
  <h1 class="crm-section-intro__title"><?= e((string) $sectionMeta['title']) ?></h1>
</header>
