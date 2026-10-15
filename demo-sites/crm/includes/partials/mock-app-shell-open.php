<?php

declare(strict_types=1);

/**
 * @var string $shellActive
 * @var string $shellPath
 * @var bool $shellCompact
 * @var bool $shellFullWidth Hide sidebar — matches in-app Deals/Leads screens.
 */
$shellActive = $shellActive ?? 'deals';
$shellPath = $shellPath ?? 'app.mazerp.com/crm';
$shellCompact = !empty($shellCompact);
$shellFullWidth = !empty($shellFullWidth);

$navItems = [
    'dashboard' => 'Dashboard',
    'leads' => 'Leads',
    'deals' => 'Deals',
    'followups' => 'Follow-ups',
    'contacts' => 'Contacts',
    'reports' => 'Reports',
];
?>
<div class="crm-app crm-app--product<?= $shellCompact ? ' crm-app--compact' : '' ?><?= $shellFullWidth ? ' crm-app--full' : '' ?>">
  <div class="crm-app__window">
    <div class="crm-app__titlebar">
      <span class="crm-app__dots" aria-hidden="true"><i></i><i></i><i></i></span>
      <span class="crm-app__url"><?= e($shellPath) ?></span>
    </div>
    <div class="crm-app__body">
      <?php if (!$shellFullWidth): ?>
      <aside class="crm-app__sidebar" aria-hidden="true">
        <div class="crm-app__sidebar-brand">Maz</div>
        <nav>
          <?php foreach ($navItems as $key => $label): ?>
            <span class="crm-app__nav-item<?= $shellActive === $key ? ' is-active' : '' ?>">
              <span class="crm-app__nav-icon"></span>
              <?php if (!$shellCompact): ?><span class="crm-app__nav-label"><?= e($label) ?></span><?php endif; ?>
            </span>
          <?php endforeach; ?>
        </nav>
      </aside>
      <?php endif; ?>
      <div class="crm-app__main">
        <div class="crm-app__content">
