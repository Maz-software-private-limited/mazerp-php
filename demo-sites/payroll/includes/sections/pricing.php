<?php

declare(strict_types=1);

$plan = pricing_plan();
$monthly = (int) ($plan['monthly_price'] ?? 0);
$included = (int) ($plan['included_employees'] ?? 10);
$addon = (int) ($plan['addon_employee_monthly'] ?? 0);
$features = $plan['features'] ?? [];
?>
<section class="section section--pricing" id="pricing" aria-labelledby="pricing-title" tabindex="-1">
  <div class="container">
    <header class="section__header section__header--center">
      <h2 id="pricing-title" class="section__title">One plan for your payroll</h2>
      <p class="section__lead">Transparent monthly pricing—10 employees included, add more when you grow.</p>
    </header>
    <div class="pricing-layout">
      <article class="pricing-card pricing-card--highlight pricing-card--single">
        <h3 class="pricing-card__name"><?= e((string) ($plan['name'] ?? 'MazERP Payroll')) ?></h3>
        <p class="pricing-card__desc"><?= e((string) ($plan['description'] ?? '')) ?></p>
        <?php if ($monthly > 0): ?>
        <p class="pricing-card__price">
          <span class="pricing-card__amount"><?= e(format_inr($monthly)) ?></span>
          <span class="pricing-card__period"> / month</span>
        </p>
        <p class="pricing-card__limit">Includes up to <strong><?= $included ?> employees</strong> on payroll each month.</p>
        <?php endif; ?>
        <?php if ($addon > 0): ?>
        <p class="pricing-card__addon">
          Employee add-on: <strong><?= e(format_inr($addon)) ?></strong> per additional employee / month (purchase in the payroll app).
        </p>
        <?php endif; ?>
        <?php if ($features !== []): ?>
        <ul class="pricing-card__features">
          <?php foreach ($features as $feature): ?>
            <li><?= e((string) $feature) ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <a class="btn btn--primary btn--block" href="<?= e(get_started_url()) ?>"><?= e((string) ($plan['cta'] ?? 'Open payroll app')) ?></a>
        <p class="pricing-card__footnote">
          <a href="<?= e(section_url('contact')) ?>">Book a walkthrough</a> for teams with 50+ employees.
        </p>
      </article>
    </div>
  </div>
</section>
