<?php

declare(strict_types=1);

$plan = pricing_plan();
$monthly = (int) ($plan['monthly_price'] ?? 999);
$included = (int) ($plan['included_employees'] ?? 10);
$addon = (int) ($plan['addon_employee_monthly'] ?? 99);
if ($monthly <= 0) {
    return;
}
?>
<aside class="hero-pricing" aria-label="Plan pricing">
  <p class="hero-pricing__label">Simple pricing</p>
  <p class="hero-pricing__price-line">
    <span class="hero-pricing__amount"><?= e(format_inr($monthly)) ?></span>
    <span class="hero-pricing__period">/ month</span>
  </p>
  <p class="hero-pricing__includes">
    For up to <strong><?= $included ?> employees</strong> — monthly payroll, PF, ESI, TDS, attendance &amp; payslips
  </p>
  <?php if ($addon > 0): ?>
  <p class="hero-pricing__addon">
    <span class="hero-pricing__addon-icon" aria-hidden="true">+</span>
    Add employees: <strong><?= e(format_inr($addon)) ?></strong> per employee / month in the app
  </p>
  <?php endif; ?>
  <p class="hero-pricing__fine">
    Growing past <?= $included ?>? Buy add-ons in the app, or <a href="<?= e(section_url('contact')) ?>">contact us</a> for larger teams.
  </p>
</aside>
