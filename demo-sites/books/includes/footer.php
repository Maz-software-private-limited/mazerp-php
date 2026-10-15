<?php

declare(strict_types=1);

$c = site_config();
$year = (int) date('Y');
$home = route_url('');
?>
<footer class="site-footer">
  <div class="container site-footer__grid">
    <div class="site-footer__brand-block">
      <a href="<?= e($home) ?>">
        <img src="<?= e(asset_url('assets/img/logo.png')) ?>" width="120" height="32" alt="<?= e($c['site_name']) ?>">
      </a>
      <p class="site-footer__tagline"><?= e($c['tagline']) ?></p>
    </div>
    <div>
      <h2 class="site-footer__heading">Product</h2>
      <ul class="site-footer__list">
        <li><a href="<?= e(section_url('features')) ?>">Features</a></li>
        <li><a href="<?= e(section_url('how-it-works')) ?>">How it works</a></li>
        <li><a href="<?= e(section_url('pricing')) ?>">Pricing</a></li>
        <li><a href="<?= e(route_url('guides/index.php')) ?>">Guides</a></li>
        <li><a href="<?= e(get_started_url()) ?>">Open app</a></li>
      </ul>
    </div>
    <div>
      <h2 class="site-footer__heading">Company</h2>
      <ul class="site-footer__list">
        <li><a href="<?= e(section_url('contact')) ?>">Contact</a></li>
        <li><a href="<?= e(section_url('faq')) ?>">FAQ</a></li>
      </ul>
    </div>
    <div>
      <h2 class="site-footer__heading">Legal</h2>
      <ul class="site-footer__list">
        <li><a href="<?= e(route_url('privacy.php')) ?>">Privacy</a></li>
        <li><a href="<?= e(route_url('terms.php')) ?>">Terms</a></li>
      </ul>
    </div>
  </div>
  <div class="container site-footer__bottom">
    <p>&copy; <?= $year ?> <?= e($c['company_name']) ?>. All rights reserved.</p>
  </div>
</footer>
<script src="<?= e(asset_url('assets/js/main.js')) ?>" defer></script>
</body>
</html>
