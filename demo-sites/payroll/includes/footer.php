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
        <img class="site-footer__logo" src="<?= e(site_logo_url()) ?>" width="256" height="72" alt="MAZ Payroll">
      </a>
      <p class="site-footer__tagline"><?= e($c['tagline']) ?></p>
      <?php
      $socialLinksModifier = 'social-links--footer';
      $socialLinksHeading = '';
      require __DIR__ . '/partials/social-links.php';
      ?>
    </div>
    <div>
      <h2 class="site-footer__heading">Product</h2>
      <ul class="site-footer__list">
        <li><a href="<?= e(section_url('features')) ?>">Features</a></li>
        <li><a href="<?= e(section_url('how-it-works')) ?>">How it works</a></li>
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
