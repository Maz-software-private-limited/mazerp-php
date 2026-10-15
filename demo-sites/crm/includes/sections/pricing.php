<?php

declare(strict_types=1);

$pricing = site_config()['pricing'];
$defaultMode = (string) ($pricing['default_mode'] ?? 'monthly');
$catalogNote = (string) ($pricing['catalog_note'] ?? '');
$trialDays = (int) ($pricing['trial_days'] ?? 14);
$plans = is_array($pricing['plans'] ?? null) ? $pricing['plans'] : [];
$startUrl = get_started_url();
$demoUrl = section_url('contact');
?>
<?php
$pricingHeadingTag = !empty($isSectionPage) ? 'h1' : 'h2';
$pricingTitle = !empty($isSectionPage) && isset($sectionMeta['title'])
    ? (string) $sectionMeta['title']
    : 'Simple plans for every sales team';
$pricingLead = !empty($isSectionPage) && isset($sectionMeta['description'])
    ? (string) $sectionMeta['description']
    : 'Start with leads and pipeline on day one. Upgrade as your team, branches, and reporting needs grow.';
?>
<section class="crm-section crm-section--wash<?= !empty($isSectionPage) ? ' crm-section--page' : '' ?>" id="pricing" aria-labelledby="pricing-title">
  <div class="crm-wrap">
    <header class="crm-section__head crm-section__head--center">
      <?php if (!empty($isSectionPage)): ?>
        <?php require __DIR__ . '/../partials/section-breadcrumb.php'; ?>
      <?php endif; ?>
      <<?= $pricingHeadingTag ?> id="pricing-title" class="crm-section__title"><?= e($pricingTitle) ?></<?= $pricingHeadingTag ?>>
      <p class="crm-section__lead"><?= e($pricingLead) ?></p>
    </header>
    <div class="crm-pricing">
      <div class="crm-pricing__toggle-wrap">
        <div class="crm-pricing__toggle" role="group" aria-label="Billing period" data-pricing-toggle>
          <button
            type="button"
            class="crm-pricing__toggle-btn<?= $defaultMode === 'monthly' ? ' is-active' : '' ?>"
            data-billing="monthly"
            aria-pressed="<?= $defaultMode === 'monthly' ? 'true' : 'false' ?>"
          >Monthly</button>
          <button
            type="button"
            class="crm-pricing__toggle-btn<?= $defaultMode === 'yearly' ? ' is-active' : '' ?>"
            data-billing="yearly"
            aria-pressed="<?= $defaultMode === 'yearly' ? 'true' : 'false' ?>"
          >Yearly</button>
        </div>
        <?php if ($catalogNote !== ''): ?>
          <p class="crm-pricing__catalog-note"><?= e($catalogNote) ?></p>
        <?php endif; ?>
      </div>

      <?php if ($plans !== []): ?>
        <div class="crm-pricing__grid">
          <?php foreach ($plans as $plan):
              $monthly = (int) ($plan['monthly_price'] ?? 0);
              $yearly = (int) ($plan['yearly_price'] ?? 0);
              $yearlyPerMonth = $yearly > 0 ? (int) round($yearly / 12) : 0;
              $highlighted = !empty($plan['highlighted']);
              $features = is_array($plan['features'] ?? null) ? $plan['features'] : [];
              $icon = (string) ($plan['icon'] ?? 'target');
              $isYearlyDefault = $defaultMode === 'yearly';
              ?>
            <article
              class="crm-pricing__card<?= $highlighted ? ' crm-pricing__card--featured' : '' ?>"
              data-plan-card
            >
              <?php if ($highlighted): ?>
                <p class="crm-pricing__ribbon">Most popular</p>
              <?php endif; ?>
              <?php if (marketing_icon($icon) !== ''): ?>
                <span class="crm-pricing__plan-icon" aria-hidden="true"><?= marketing_icon($icon) ?></span>
              <?php endif; ?>
              <h3 class="crm-pricing__name"><?= e((string) ($plan['name'] ?? '')) ?></h3>
              <?php if (!empty($plan['description'])): ?>
                <p class="crm-pricing__desc"><?= e((string) $plan['description']) ?></p>
              <?php endif; ?>
              <div
                class="crm-pricing__price"
                data-plan-price
                data-format-monthly="<?= e(format_inr($monthly)) ?>"
                data-format-yearly="<?= e(format_inr($yearly)) ?>"
                data-equiv-yearly="<?= e(format_inr($yearlyPerMonth)) ?>"
                data-default-billing="<?= e($defaultMode) ?>"
              >
                <span data-price-amount><?= $isYearlyDefault ? e(format_inr($yearly)) : e(format_inr($monthly)) ?></span>
                <span class="crm-pricing__period" data-price-period><?= $isYearlyDefault ? ' / year' : ' / month' ?></span>
              </div>
              <?php if ($yearly > 0): ?>
                <p class="crm-pricing__equiv" data-price-equiv<?= $isYearlyDefault ? '' : ' hidden' ?>>
                  <?= e(format_inr($yearlyPerMonth)) ?> / month when billed yearly
                </p>
              <?php endif; ?>
              <?php if ($trialDays > 0): ?>
                <p class="crm-pricing__trial"><?= (int) $trialDays ?>-day trial available</p>
              <?php endif; ?>
              <?php if ($features !== []): ?>
                <ul class="crm-pricing__features crm-pricing__features--checks">
                  <?php foreach ($features as $feature): ?>
                    <li>
                      <span class="crm-pricing__check" aria-hidden="true"><?= marketing_icon('check') ?></span>
                      <span><?= e((string) $feature) ?></span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              <a
                class="crm-btn crm-btn--block<?= $highlighted ? ' crm-btn--solid' : ' crm-btn--outline' ?>"
                href="<?= e($startUrl) ?>"
              >Start free</a>
              <p class="crm-pricing__demo">
                <a href="<?= e($demoUrl) ?>">Book a demo</a>
              </p>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
