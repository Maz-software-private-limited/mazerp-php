<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/plans-api.php';

$resolved = timex_resolve_pricing_plans($timex_plans);
$plans = $resolved['plans'];
$plansLive = $resolved['live'];
$planCount = count($plans);
$colClass = $planCount >= 4 ? 'col-md-6 col-lg-3' : ($planCount === 1 ? 'col-md-6 col-lg-4 mx-auto' : 'col-md-6 col-lg-4');

$planNames = array_values(array_filter(array_map(function ($p) {
    return $p['name'] ?? '';
}, $plans)));
$heroCompare = $planNames
    ? ('Compare ' . (count($planNames) > 1
        ? implode(', ', array_slice($planNames, 0, -1)) . (count($planNames) > 2 ? ',' : '') . ' and ' . $planNames[count($planNames) - 1]
        : $planNames[0]) . '. Start free or talk to us for a plan that matches your headcount.')
    : 'Compare workforce plans for your team. Start free or book a demo.';

$pricing_faqs = [
  [
    'q' => 'Is pricing final on this page?',
    'a' => $plansLive
      ? 'Displayed amounts come from the live Maz Timex catalog. Taxes may apply. Contact us if you need a custom quote for larger teams.'
      : 'Live catalog prices are temporarily unavailable, so this page shows fallback plan details. Use Start Free or Book a Demo for current options.',
  ],
  [
    'q' => 'Can I start without choosing a paid plan?',
    'a' => 'Yes. Use Start Free to begin in the product, or Book a Demo for a guided walkthrough of employees, shifts, live attendance, leave, and reports.',
  ],
  [
    'q' => 'Do plans differ by attendance features?',
    'a' => 'Plans typically differ by employee limits and capabilities such as overtime, geo-fence depth, location tracking, and advanced reports. Exact inclusions come from the live catalog or your quote.',
  ],
  [
    'q' => 'Is there monthly and yearly billing?',
    'a' => 'Yes. Toggle Monthly or Yearly above the plans. Yearly pricing is shown when the catalog provides a yearly amount for that plan.',
  ],
];

include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero text-center">
  <div class="container">
    <nav class="timex-breadcrumb justify-content-center" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> / Pricing
    </nav>
    <div class="timex-eyebrow">Pricing</div>
    <h1>Workforce plans that scale with your team</h1>
    <p class="mx-auto"><?php echo htmlspecialchars($heroCompare); ?></p>
    <div class="timex-billing-toggle mt-3" data-timex-billing>
      <button type="button" class="btn active" data-billing="monthly">Monthly</button>
      <button type="button" class="btn" data-billing="yearly">Yearly</button>
    </div>
    <?php if (!$plansLive): ?>
      <p class="small text-secondary mt-3 mb-0">Showing fallback plan details while the live pricing catalog is unavailable.</p>
    <?php elseif ($resolved['source'] === 'cache'): ?>
      <p class="small text-secondary mt-3 mb-0">Prices refreshed from catalog cache. Taxes may apply.</p>
    <?php else: ?>
      <p class="small text-secondary mt-3 mb-0">Live catalog prices. Taxes may apply.</p>
    <?php endif; ?>
  </div>
</section>

<section class="timex-section pt-2">
  <div class="container">
    <div class="row g-3 g-lg-4 justify-content-center">
      <?php foreach ($plans as $plan):
        $isQuote = !empty($plan['is_quote']);
        $monthlyLabel = !$isQuote && !empty($plan['monthly_label']) ? $plan['monthly_label'] : '';
        $yearlyLabel = !$isQuote && !empty($plan['yearly_label']) ? $plan['yearly_label'] : '';
        $display = $monthlyLabel !== '' ? $monthlyLabel : 'Contact us';
        $unit = $monthlyLabel !== '' ? '/month' : '';
        $primaryCta = $isQuote ? timex_url('contact') : TIMEX_SIGNUP_URL;
        $primaryLabel = $isQuote ? 'Book a Demo' : 'Start Free';
      ?>
      <div class="<?php echo htmlspecialchars($colClass); ?>">
        <div class="timex-plan-card <?php echo !empty($plan['popular']) ? 'is-popular' : ''; ?>">
          <?php if (!empty($plan['popular'])): ?>
            <div class="timex-popular-banner">MOST POPULAR</div>
          <?php endif; ?>
          <div class="timex-plan-icon <?php echo htmlspecialchars($plan['icon'] ?? 'blue'); ?>">
            <i class="fa-solid <?php echo htmlspecialchars($plan['icon_fa'] ?? 'fa-clock'); ?>" aria-hidden="true"></i>
          </div>
          <h2 class="h5 fw-bold"><?php echo htmlspecialchars($plan['name']); ?></h2>
          <?php if (!empty($plan['blurb'])): ?>
            <p class="small text-secondary"><?php echo htmlspecialchars($plan['blurb']); ?></p>
          <?php endif; ?>
          <div class="timex-plan-price"
               data-price-monthly="<?php echo htmlspecialchars($monthlyLabel); ?>"
               data-price-yearly="<?php echo htmlspecialchars($yearlyLabel !== '' ? $yearlyLabel : ($monthlyLabel !== '' ? $monthlyLabel : '')); ?>">
            <span data-price-value><?php echo htmlspecialchars($display); ?></span>
            <span class="fs-6 fw-normal text-secondary" data-price-unit="<?php echo htmlspecialchars($unit); ?>"><?php echo htmlspecialchars($unit); ?></span>
          </div>
          <?php if (!empty($plan['trial_enabled']) && !empty($plan['trial_days'])): ?>
            <p class="small text-secondary mb-2"><?php echo (int) $plan['trial_days']; ?>-day trial available</p>
          <?php endif; ?>
          <?php if (!empty($plan['features'])): ?>
          <ul class="timex-plan-features">
            <?php foreach ($plan['features'] as $feat): ?>
              <li><?php echo htmlspecialchars($feat); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <?php if (!empty($plan['note'])): ?>
            <p class="small text-secondary"><?php echo htmlspecialchars($plan['note']); ?></p>
          <?php endif; ?>
          <div class="d-grid gap-2">
            <a href="<?php echo htmlspecialchars($primaryCta); ?>" class="btn <?php echo !empty($plan['popular']) ? 'btn-primary' : 'btn-outline-primary'; ?>"><?php echo htmlspecialchars($primaryLabel); ?></a>
            <?php if (!$isQuote): ?>
              <a href="<?php echo htmlspecialchars(timex_url('contact')); ?>" class="btn btn-link">Book a Demo</a>
            <?php else: ?>
              <a href="<?php echo htmlspecialchars(TIMEX_SIGNUP_URL); ?>" class="btn btn-link">Start Free</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="timex-section">
  <div class="container" style="max-width:44rem;">
    <h2 class="fw-bold text-center mb-4">Pricing FAQ</h2>
    <div class="accordion timex-faq" id="pricingFaq">
      <?php foreach ($pricing_faqs as $i => $faq): ?>
      <div class="accordion-item">
        <h3 class="accordion-header" id="pfh<?php echo $i; ?>">
          <button class="accordion-button <?php echo $i ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#pfc<?php echo $i; ?>" aria-expanded="<?php echo $i ? 'false' : 'true'; ?>" aria-controls="pfc<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
          </button>
        </h3>
        <div id="pfc<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i ? '' : 'show'; ?>" data-bs-parent="#pricingFaq">
          <div class="accordion-body text-secondary"><?php echo htmlspecialchars($faq['a']); ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
