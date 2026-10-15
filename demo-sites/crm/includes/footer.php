<?php

declare(strict_types=1);

$c = site_config();
$year = (int) date('Y');
$home = route_url('');
$suiteProducts = suite_products_for_nav();
$phone = $c['contact_phone'] ?? '';
$email = $c['contact_email'] ?? '';
$whatsapp = $c['contact_whatsapp'] ?? '';
?>
<footer class="crm-footer">
  <div class="crm-wrap crm-footer__grid">
    <div class="crm-footer__brand">
      <a href="<?= e($home) ?>" class="crm-footer__logo">
        <img class="crm-brand-logo" src="<?= e(logo_url()) ?>" width="77" height="32" alt="<?= e($c['product_name']) ?>">
      </a>
      <p><?= e($c['tagline']) ?></p>
      <p class="crm-footer__suite">Part of the <?= e($c['suite_name']) ?> suite</p>
      <?php
      $socialLinksModifier = 'social-links--footer';
      $socialLinksHeading = '';
      require __DIR__ . '/partials/social-links.php';
      ?>
    </div>
    <div>
      <h2 class="crm-footer__title">Product</h2>
      <ul class="crm-footer__list">
        <li><a href="<?= e(section_url('features')) ?>">Features</a></li>
        <li><a href="<?= e(section_url('why')) ?>">Why Maz CRM</a></li>
        <li><a href="<?= e(section_url('pipeline')) ?>">Sales pipeline</a></li>
        <li><a href="<?= e(section_url('follow-ups')) ?>">Follow-ups</a></li>
        <li><a href="<?= e(section_url('preview')) ?>">Preview</a></li>
        <li><a href="<?= e(get_started_url()) ?>">Start free</a></li>
      </ul>
    </div>
    <div>
      <h2 class="crm-footer__title"><?= e($c['suite_name']) ?> products</h2>
      <ul class="crm-footer__list">
        <?php foreach ($suiteProducts as $product): ?>
          <li>
            <a href="<?= e((string) $product['url']) ?>"><?= e((string) $product['label']) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div>
      <h2 class="crm-footer__title">Company</h2>
      <ul class="crm-footer__list">
        <li><a href="<?= e(section_url('pricing')) ?>">Pricing</a></li>
        <li><a href="<?= e(section_url('faq')) ?>">FAQ</a></li>
        <li><a href="<?= e(section_url('contact')) ?>">Contact</a></li>
      </ul>
    </div>
    <div>
      <h2 class="crm-footer__title">Legal</h2>
      <ul class="crm-footer__list">
        <li><a href="<?= e(route_url('privacy.php')) ?>">Privacy policy</a></li>
        <li><a href="<?= e(route_url('terms.php')) ?>">Terms of service</a></li>
      </ul>
      <?php if ($phone !== '' || $email !== ''): ?>
      <h2 class="crm-footer__title crm-footer__title--contact">Contact</h2>
      <ul class="crm-footer__list crm-footer__contact">
        <?php if ($phone !== ''): ?>
          <li><a href="tel:<?= e(preg_replace('/\s+/', '', $phone) ?? '') ?>"><?= e($phone) ?></a></li>
        <?php endif; ?>
        <?php if ($email !== ''): ?>
          <li><a href="mailto:<?= e($email) ?>"><?= e($email) ?></a></li>
        <?php endif; ?>
        <?php if ($whatsapp !== ''): ?>
          <li><a href="<?= e($whatsapp) ?>" rel="noopener noreferrer">WhatsApp</a></li>
        <?php endif; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <div class="crm-wrap crm-footer__legal">
    <p>&copy; <?= $year ?> <?= e($c['product_name']) ?>. All rights reserved.</p>
    <p class="crm-footer__tag">Built for Indian sales teams — leads, pipeline, follow-ups, and reports.</p>
  </div>
</footer>
<script src="<?= e(asset_url('assets/js/main.js')) ?>" defer></script>
</body>
</html>
