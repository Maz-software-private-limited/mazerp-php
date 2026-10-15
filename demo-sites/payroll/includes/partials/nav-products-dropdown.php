<?php

declare(strict_types=1);

$products = mazerp_products_menu();
if ($products === []) {
    return;
}
?>
<li class="site-header__item site-header__item--dropdown">
  <button
    type="button"
    class="site-header__dropdown-trigger"
    id="nav-products-trigger"
    aria-expanded="false"
    aria-haspopup="true"
    aria-controls="nav-products-menu"
    data-nav-products-trigger
  >
    All products
    <svg class="site-header__dropdown-chevron" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true"><path fill="currentColor" d="M2.5 4.5 6 8l3.5-3.5H2.5z"/></svg>
  </button>
  <div class="site-header__dropdown" id="nav-products-menu" role="menu" aria-labelledby="nav-products-trigger" hidden data-nav-products-menu>
    <?php foreach ($products as $product): ?>
      <a
        class="product-menu__link<?= !empty($product['current']) ? ' is-current' : '' ?>"
        role="menuitem"
        href="<?= e($product['href']) ?>"
        <?= !empty($product['current']) ? ' aria-current="page"' : '' ?>
      >
        <span class="product-menu__icon product-menu__icon--<?= e($product['id']) ?>" aria-hidden="true">
          <?php if ($product['id'] === 'books'): ?>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M4 5h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1zm2 2v10h12V7H6zm2 2h8v2H8V9zm0 3h6v2H8v-2z"/></svg>
          <?php elseif ($product['id'] === 'crm'): ?>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
          <?php elseif ($product['id'] === 'payroll'): ?>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M11.8 10.9H5.5c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5h6.3c.8 0 1.5-.7 1.5-1.5s-.7-1.5-1.5-1.5zm8.2 0h-2.3c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5H20c.8 0 1.5-.7 1.5-1.5s-.7-1.5-1.5-1.5zM4 6h16v2H4V6zm0 10h16v2H4v-2z"/></svg>
          <?php else: ?>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 14.5h-2v-5h2v5zm0-7h-2V7h2v2.5z"/></svg>
          <?php endif; ?>
        </span>
        <span class="product-menu__text">
          <span class="product-menu__label"><?= e($product['label']) ?></span>
          <span class="product-menu__desc"><?= e($product['description']) ?></span>
        </span>
      </a>
    <?php endforeach; ?>
  </div>
</li>
