<?php

declare(strict_types=1);

$c = site_config();
$theme = active_theme();
$headerLayout = (string) ($theme['header'] ?? 'bar');
$homeIndex = route_url('');
$nav = [
    ['type' => 'products'],
    ['href' => section_url('features'), 'label' => 'Features'],
    ['href' => section_url('how-it-works'), 'label' => 'How it works'],
    ['href' => section_url('faq'), 'label' => 'FAQ'],
    ['href' => section_url('contact'), 'label' => 'Contact'],
];
?>
<?php if ($headerLayout === 'float'): ?>
<div class="site-header-wrap site-header-wrap--float">
<?php endif; ?>
<header class="site-header" data-header>
  <div class="container site-header__inner">
    <a class="site-header__brand" href="<?= e($homeIndex) ?>">
      <img src="<?= e(site_logo_url()) ?>" width="280" height="80" alt="MAZ Payroll — payroll software India" fetchpriority="high">
    </a>
    <button type="button" class="site-header__menu-btn" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
      <span class="visually-hidden">Open menu</span>
      <span class="site-header__menu-icon" aria-hidden="true"></span>
    </button>
    <nav id="site-nav" class="site-header__nav" data-nav>
      <ul class="site-header__links">
        <?php foreach ($nav as $item): ?>
          <?php if (($item['type'] ?? '') === 'products'): ?>
            <?php require __DIR__ . '/partials/nav-products-dropdown.php'; ?>
          <?php else: ?>
            <li>
              <a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <div class="site-header__actions">
        <a class="btn btn--ghost" href="<?= e(login_url()) ?>">Log in</a>
        <a class="btn btn--primary" href="<?= e(get_started_url()) ?>">Open payroll app</a>
      </div>
    </nav>
  </div>
</header>
<?php if ($headerLayout === 'float'): ?>
</div>
<?php endif; ?>
