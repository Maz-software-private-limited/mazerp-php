<?php

declare(strict_types=1);

/** @var string $homeSection */

if (empty($isSectionPage) || $homeSection === '') {
    return;
}

$navLabel = match ($homeSection) {
    'how-it-works' => 'How it works',
    'follow-ups' => 'Follow-ups',
    'why' => 'Why Maz CRM',
    'faq' => 'FAQ',
    'preview' => 'Product preview',
    default => ucfirst(str_replace('-', ' ', $homeSection)),
};
?>
<nav class="crm-breadcrumb" aria-label="Breadcrumb">
  <a href="<?= e(route_url('')) ?>">Home</a>
  <span class="crm-breadcrumb__sep" aria-hidden="true">/</span>
  <span aria-current="page"><?= e($navLabel) ?></span>
</nav>
