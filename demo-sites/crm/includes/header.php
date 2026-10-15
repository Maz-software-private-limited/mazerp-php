<?php

declare(strict_types=1);

require_once __DIR__ . '/partials/product-icon.php';

$c = site_config();
$homeIndex = route_url('');
$currentSection = crm_current_home_section();
$products = suite_products_for_nav();
$nav = [
    ['id' => 'features', 'href' => section_url('features'), 'label' => 'Features'],
    ['id' => 'pricing', 'href' => section_url('pricing'), 'label' => 'Pricing'],
    ['id' => 'faq', 'href' => section_url('faq'), 'label' => 'FAQ'],
    ['id' => 'contact', 'href' => section_url('contact'), 'label' => 'Contact'],
];
?>
<header class="crm-header" data-header>
  <div class="crm-wrap crm-header__inner">
    <a class="crm-header__brand" href="<?= e($homeIndex) ?>" aria-label="<?= e($c['product_name']) ?> home">
      <img
        class="crm-header__logo crm-brand-logo"
        src="<?= e(logo_url()) ?>"
        width="130"
        height="36"
        alt=""
        fetchpriority="high"
      >
    </a>
    <div id="crm-nav" class="crm-header__panel" data-nav>
      <nav class="crm-header__nav" aria-label="Primary">
        <ul class="crm-header__links">
          <li class="crm-mega" data-mega>
            <button
              type="button"
              class="crm-mega__trigger"
              aria-expanded="false"
              aria-haspopup="true"
              aria-controls="crm-products-panel"
              data-mega-toggle
            >
              Products
              <span class="crm-mega__chevron" aria-hidden="true"></span>
            </button>
            <div id="crm-products-panel" class="crm-mega__panel" hidden data-mega-panel>
              <p class="crm-mega__label"><?= e($c['suite_name']) ?> suite</p>
              <ul class="crm-mega__menu">
                <?php foreach ($products as $product): ?>
                  <li>
                    <a
                      href="<?= e((string) $product['url']) ?>"
                      class="crm-mega__item<?= !empty($product['current']) ? ' is-current' : '' ?>"
                      <?php if (!empty($product['current'])): ?>aria-current="page"<?php endif; ?>
                    >
                      <span class="crm-mega__icon"><?= product_icon((string) $product['id']) ?></span>
                      <span class="crm-mega__text">
                        <span class="crm-mega__name"><?= e((string) $product['label']) ?></span>
                        <span class="crm-mega__desc"><?= e((string) $product['description']) ?></span>
                      </span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </li>
          <?php foreach ($nav as $item): ?>
            <li>
              <a
                href="<?= e($item['href']) ?>"
                <?php if ($currentSection === $item['id']): ?>class="is-active" aria-current="page"<?php endif; ?>
              ><?= e($item['label']) ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <div class="crm-header__cta">
        <a class="crm-btn crm-btn--ghost" href="<?= e(login_url()) ?>">Sign in</a>
        <a class="crm-btn crm-btn--solid" href="<?= e(get_started_url()) ?>">Start free</a>
      </div>
    </div>
    <button type="button" class="crm-header__toggle" aria-expanded="false" aria-controls="crm-nav" data-nav-toggle>
      <span class="crm-visually-hidden">Open menu</span>
      <span class="crm-header__toggle-bars" aria-hidden="true"></span>
    </button>
  </div>
</header>
