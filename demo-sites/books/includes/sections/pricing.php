<?php

declare(strict_types=1);

$pricing = site_config()['pricing'];
$catalog = pricing_catalog();
$catalogState = (string) ($catalog['state'] ?? 'error');
$defaultMode = (string) ($pricing['default_mode'] ?? 'yearly');
$heroTitle = (string) ($pricing['hero_title'] ?? 'Pricing');
$heroLead = (string) ($pricing['hero_lead'] ?? '');
$consoleNote = (string) ($pricing['console_note'] ?? '');
$plans = pricing_plans();
$pricingFaq = $pricing['pricing_faq'] ?? [];
$comparison = $pricing['comparison'] ?? [];
$comparisonEnabled = !empty($comparison['enabled']) && count($plans) > 1;
$comparisonRows = is_array($comparison['rows'] ?? null) ? $comparison['rows'] : [];
$showToggle = pricing_show_billing_toggle();
$officialConsolePricing = books_console_pricing_url();
$fetchedAt = isset($catalog['fetched_at']) ? (int) $catalog['fetched_at'] : null;
$fromCache = !empty($catalog['from_cache']);
$isStale = !empty($catalog['stale']);
?>
<section class="section pricing-section" id="pricing" aria-labelledby="pricing-title">
  <div class="pricing-section__hero">
    <div class="container pricing-section__hero-inner">
      <header class="pricing-section__intro">
        <h2 id="pricing-title" class="pricing-section__title"><?= e($heroTitle) ?></h2>
        <?php if ($heroLead !== ''): ?>
          <p class="pricing-section__lead"><?= e($heroLead) ?></p>
        <?php endif; ?>
        <?php if ($consoleNote !== ''): ?>
          <p class="pricing-section__note"><?= e($consoleNote) ?></p>
        <?php endif; ?>
        <?php if ($catalogState === 'ok' && $fetchedAt !== null): ?>
          <p class="pricing-section__meta">
            Prices from MazERP<?= $fromCache ? ' (cached' . ($isStale ? ', last successful sync' : '') . ')' : '' ?> —
            updated <?= e(gmdate('j M Y, H:i', $fetchedAt)) ?> UTC
          </p>
        <?php endif; ?>
      </header>
    </div>
  </div>

  <div class="container pricing-section__body">
    <?php if ($catalogState === 'error' || $catalogState === 'empty'): ?>
      <div class="pricing-section__state pricing-section__state--<?= e($catalogState) ?>" role="status">
        <p class="pricing-section__state-text">
          <?= e((string) ($catalog['message'] ?? 'Pricing plans are currently unavailable.')) ?>
        </p>
        <a class="btn btn--primary" href="<?= e($officialConsolePricing) ?>">Open official Books pricing</a>
      </div>
    <?php else: ?>
      <?php if ($showToggle): ?>
        <div class="pricing-toggle-wrap">
          <div class="pricing-toggle" role="group" aria-label="Billing period" data-pricing-toggle>
            <button
              type="button"
              class="pricing-toggle__btn<?= $defaultMode === 'yearly' ? ' is-active' : '' ?>"
              data-billing="yearly"
              aria-pressed="<?= $defaultMode === 'yearly' ? 'true' : 'false' ?>"
            >Yearly</button>
            <button
              type="button"
              class="pricing-toggle__btn<?= $defaultMode === 'monthly' ? ' is-active' : '' ?>"
              data-billing="monthly"
              aria-pressed="<?= $defaultMode === 'monthly' ? 'true' : 'false' ?>"
            >Monthly</button>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($plans === []): ?>
        <div class="pricing-section__state pricing-section__state--empty" role="status">
          <p class="pricing-section__state-text">Pricing plans are currently unavailable.</p>
          <a class="btn btn--primary" href="<?= e($officialConsolePricing) ?>">Open official Books pricing</a>
        </div>
      <?php else: ?>
        <div class="pricing-grid pricing-grid--<?= count($plans) <= 2 ? (string) count($plans) : 'multi' ?>">
          <?php foreach ($plans as $plan):
              $planId = (string) ($plan['id'] ?? 'plan');
              $currency = (string) ($plan['currency'] ?? 'INR');
              $monthly = $plan['monthly_price'] ?? null;
              $yearly = $plan['yearly_price'] ?? null;
              $monthlyEnabled = !empty($plan['monthly_enabled']);
              $yearlyEnabled = !empty($plan['yearly_enabled']);
              $hasMonthly = $monthlyEnabled && $monthly !== null && (int) $monthly > 0;
              $hasYearly = $yearlyEnabled && $yearly !== null && (int) $yearly > 0;
              $priceLabel = (string) ($plan['price_label'] ?? 'View pricing details');
              $yearlyPerMonth = $hasYearly ? (int) round((int) $yearly / 12) : 0;
              $ctaLabel = (string) ($plan['cta_label'] ?? 'Choose plan');
              $ctaUrl = pricing_plan_cta_url($plan, $defaultMode);
              $isQuote = !empty($plan['is_quote']);
              $highlighted = !empty($plan['highlighted']);
              $features = is_array($plan['features'] ?? null) ? $plan['features'] : [];
              $planCode = isset($plan['plan_code']) ? (string) $plan['plan_code'] : '';
              $useConsoleCta = !$isQuote && $planCode !== '';
              ?>
            <article
              class="pricing-card<?= $highlighted ? ' pricing-card--highlight' : '' ?><?= $isQuote ? ' pricing-card--quote' : '' ?>"
              data-plan-card
              data-plan-id="<?= e($planId) ?>"
            >
              <?php if ($highlighted): ?>
                <p class="pricing-card__ribbon">Popular</p>
              <?php endif; ?>
              <h3 class="pricing-card__name"><?= e((string) ($plan['name'] ?? '')) ?></h3>
              <?php if (!empty($plan['description'])): ?>
                <p class="pricing-card__desc"><?= e((string) $plan['description']) ?></p>
              <?php endif; ?>

              <div
                class="pricing-card__price"
                data-plan-price
                data-has-monthly="<?= $hasMonthly ? '1' : '0' ?>"
                data-has-yearly="<?= $hasYearly ? '1' : '0' ?>"
                data-quote="<?= ($hasMonthly || $hasYearly) ? '0' : '1' ?>"
                data-price-label="<?= e($priceLabel) ?>"
                <?php if ($hasMonthly): ?>
                  data-format-monthly="<?= e(format_plan_money((int) $monthly, $currency)) ?>"
                <?php endif; ?>
                <?php if ($hasYearly): ?>
                  data-format-yearly="<?= e(format_plan_money((int) $yearly, $currency)) ?>"
                  data-equiv-yearly="<?= e(format_plan_money($yearlyPerMonth, $currency)) ?>"
                <?php endif; ?>
                data-default-billing="<?= e($defaultMode) ?>"
              >
                <?php if ($hasMonthly || $hasYearly): ?>
                  <span data-price-amount><?= $defaultMode === 'yearly' && $hasYearly ? e(format_plan_money((int) $yearly, $currency)) : ($hasMonthly ? e(format_plan_money((int) $monthly, $currency)) : e(format_plan_money((int) $yearly, $currency))) ?></span>
                  <span class="pricing-card__period" data-price-period><?= ($defaultMode === 'yearly' && $hasYearly) ? ' / year' : ' / month' ?></span>
                <?php else: ?>
                  <span class="pricing-card__price-label" data-price-amount><?= e($priceLabel) ?></span>
                <?php endif; ?>
              </div>
              <?php if ($hasYearly): ?>
                <p class="pricing-card__equiv" data-price-equiv<?= $defaultMode === 'yearly' ? '' : ' hidden' ?>>
                  <?= e(format_plan_money($yearlyPerMonth, $currency)) ?> / month when billed yearly
                </p>
              <?php endif; ?>

              <?php if (!empty($plan['trial_enabled']) && !empty($plan['trial_days'])): ?>
                <p class="pricing-card__limit"><?= (int) $plan['trial_days'] ?>-day trial available in console</p>
              <?php endif; ?>

              <?php if (!empty($plan['limit_note'])): ?>
                <p class="pricing-card__limit"><?= e((string) $plan['limit_note']) ?></p>
              <?php endif; ?>

              <?php if ($features !== []): ?>
                <ul class="pricing-card__features pricing-card__features--icons">
                  <?php foreach ($features as $feature): ?>
                    <li>
                      <span class="pricing-card__check"><?= marketing_icon('check') ?></span>
                      <span><?= e((string) $feature) ?></span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <a
                class="btn <?= $highlighted ? 'btn--primary' : 'btn--secondary' ?> btn--block"
                href="<?= e($ctaUrl) ?>"
                <?php if ($useConsoleCta): ?>
                  data-pricing-cta-console
                <?php endif; ?>
              ><?= e($ctaLabel) ?></a>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <p class="pricing-section__console-link">
      <a href="<?= e($officialConsolePricing) ?>">Open Books pricing in MazERP console</a>
      ·
      <a href="<?= e(books_console_addons_url()) ?>">View add-ons</a>
    </p>

    <?php if ($comparisonEnabled && $comparisonRows !== []): ?>
      <div class="pricing-compare reveal-on-scroll">
        <h3 class="pricing-compare__title">Compare plans</h3>
        <div class="pricing-compare__wrap">
          <table class="pricing-compare__table">
            <thead>
              <tr>
                <th scope="col">Feature</th>
                <?php foreach ($plans as $plan): ?>
                  <th scope="col"><?= e((string) ($plan['name'] ?? '')) ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($comparisonRows as $row): ?>
                <tr>
                  <th scope="row"><?= e((string) ($row['label'] ?? '')) ?></th>
                  <?php foreach ($plans as $plan):
                      $planId = (string) ($plan['id'] ?? '');
                      $cells = is_array($row['cells'] ?? null) ? $row['cells'] : [];
                      $cell = $cells[$planId] ?? ['text' => '—', 'included' => false];
                      ?>
                    <td><?= e((string) ($cell['text'] ?? '—')) ?></td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($pricingFaq !== []): ?>
      <div class="pricing-faq" id="pricing-faq" aria-labelledby="pricing-faq-title">
        <h3 id="pricing-faq-title" class="pricing-faq__title">Pricing questions</h3>
        <div class="faq faq--compact" data-faq>
          <?php foreach ($pricingFaq as $index => $item): ?>
            <details class="faq__item"<?= $index === 0 ? ' open' : '' ?>>
              <summary class="faq__question"><?= e($item['question']) ?></summary>
              <div class="faq__answer">
                <p><?= e($item['answer']) ?></p>
              </div>
            </details>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="pricing-section__footer-cta">
      <p class="pricing-section__footer-text">Ready to explore Books with your own data?</p>
      <div class="pricing-section__footer-actions">
        <a class="btn btn--primary btn--lg" href="<?= e($officialConsolePricing) ?>">View plans &amp; pricing</a>
        <a class="btn btn--secondary btn--lg" href="<?= e(get_started_url()) ?>">Get started</a>
        <a class="btn btn--ghost btn--lg" href="<?= e(section_url('contact')) ?>">Request a walkthrough</a>
      </div>
    </div>
  </div>
</section>
