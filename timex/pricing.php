<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/plans-api.php';

$resolved = timex_resolve_pricing_plans($timex_plans);
$plans = $resolved['plans'];
$plansLive = $resolved['live'];
$plan = timex_select_primary_plan($plans);

$commitmentOffers = [];
if ($plan && !empty($plan['commitment_offers']) && is_array($plan['commitment_offers'])) {
    $commitmentOffers = timex_enrich_commitment_offer_display($plan['commitment_offers']);
} else {
    $commitmentOffers = timex_select_commitment_offers([], 'INR', timex_default_commitment_offers());
}

$bestOffer = null;
foreach ($commitmentOffers as $offer) {
    if (!empty($offer['best_value'])) {
        $bestOffer = $offer;
        break;
    }
}
if ($bestOffer === null && !empty($commitmentOffers)) {
    $bestOffer = $commitmentOffers[count($commitmentOffers) - 1];
}

$monthlySavings = timex_commitment_monthly_savings($commitmentOffers);
$includedFeatures = !empty($timex_pricing_included) && is_array($timex_pricing_included)
    ? $timex_pricing_included
    : [];

$stickyPrice = $bestOffer['monthly_label'] ?? 'Start Now';
$stickyUnit = !empty($bestOffer['monthly_label']) ? '/month' : '';
$stickyCta = $bestOffer
    ? timex_signup_commitment_url((int) $bestOffer['months'])
    : TIMEX_SIGNUP_URL;
$stickyLabel = $bestOffer['cta_label'] ?? 'Get Started with Timex';

$offerByMonths = [];
foreach ($commitmentOffers as $offer) {
    $offerByMonths[(int) ($offer['months'] ?? 0)] = $offer;
}

$pricing_faqs = [
    [
        'q' => 'Is there more than one Timex plan?',
        'a' => 'No. Maz Timex is one complete workforce plan. You choose a 6- or 12-month commitment offer—not different feature tiers.',
    ],
    [
        'q' => 'How do the 6- and 12-month offers work?',
        'a' => 'Each offer is a prepaid commitment. Prices show an effective monthly rate and the total for that period. The longer commitment has a lower effective monthly price.',
    ],
    [
        'q' => 'Which offer is best value?',
        'a' => $monthlySavings
            ? ('The 12-month offer is best value—about ' . $monthlySavings['label'] . ' less per month than the 6-month offer.')
            : 'The 12-month offer is marked best value when both commitments are available.',
    ],
    [
        'q' => 'What is included?',
        'a' => 'One Timex plan covers employee management, attendance and time tracking, leave, workforce operations, mobile access, reports, role-based access, and a secure cloud platform.',
    ],
    [
        'q' => 'Are taxes included?',
        'a' => 'Prices and offers are subject to applicable taxes and offer terms.',
    ],
    [
        'q' => 'Can I get a demo first?',
        'a' => 'Yes. Use Book a Demo anytime—we will walk you through attendance, leave, and workforce reports.',
    ],
];

include __DIR__ . '/includes/header.php';
?>

<section class="timex-pricing-stage">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> / Pricing
    </nav>
    <div class="timex-pricing-stage__intro">
      <div class="timex-eyebrow">Maz Timex</div>
      <h1>One Plan. More Savings.</h1>
      <p class="timex-pricing-stage__lead">Complete workforce management, without complicated plans.</p>
      <p class="timex-pricing-stage__support">Get everything you need to manage your workforce in one powerful Timex plan. Choose the offer that works best for your business and save more when you commit longer.</p>
    </div>
  </div>
</section>

<section class="timex-section timex-pricing-included-section">
  <div class="container">
    <div class="timex-pricing-included mx-auto">
      <div class="text-center mb-4">
        <div class="timex-eyebrow">Timex Workforce Management</div>
        <h2 class="fw-bold">Everything your team needs. One complete experience.</h2>
      </div>
      <?php if (!empty($includedFeatures)): ?>
      <ul class="timex-pricing-checklist">
        <?php foreach ($includedFeatures as $item): ?>
          <li>
            <i class="fa-solid fa-check" aria-hidden="true"></i>
            <span><?php echo htmlspecialchars($item); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php if (!empty($commitmentOffers)): ?>
<section class="timex-section pt-0" id="timex-offers">
  <div class="container">
    <div class="text-center mx-auto mb-4" style="max-width:40rem;">
      <div class="timex-eyebrow">Commitment offers</div>
      <h2 class="fw-bold">Choose how long you want to save</h2>
    </div>
    <div class="timex-offer-cards">
      <?php foreach ($commitmentOffers as $offer):
        $isBest = !empty($offer['best_value']);
        $ctaUrl = timex_signup_commitment_url((int) ($offer['months'] ?? 0));
      ?>
      <article class="timex-offer-card<?php echo $isBest ? ' timex-offer-card--best' : ''; ?>">
        <?php if ($isBest): ?>
          <div class="timex-offer-card__badge">Best value</div>
        <?php endif; ?>
        <h3 class="timex-offer-card__title"><?php echo htmlspecialchars($offer['name'] ?? ''); ?></h3>
        <div class="timex-price-stack">
          <?php if (!empty($offer['compare_monthly_label'])): ?>
            <div class="timex-price-stack__was">
              <s><?php echo htmlspecialchars($offer['compare_monthly_label']); ?></s>
            </div>
          <?php endif; ?>
          <div class="timex-price-stack__now">
            <span class="timex-price-stack__amount">
              <span class="timex-price-stack__major"><?php echo htmlspecialchars($offer['monthly_major'] ?? $offer['monthly_label'] ?? ''); ?></span>
              <?php if (!empty($offer['monthly_minor'])): ?>
                <span class="timex-price-stack__minor"><?php echo htmlspecialchars($offer['monthly_minor']); ?></span>
              <?php endif; ?>
            </span>
            <span class="timex-price-stack__unit">/month</span>
          </div>
          <?php if (!empty($offer['save_caption'])): ?>
            <p class="timex-price-stack__caption"><?php echo htmlspecialchars($offer['save_caption']); ?></p>
          <?php endif; ?>
        </div>
        <?php if (!empty($offer['blurb'])): ?>
          <p class="timex-offer-card__blurb"><?php echo htmlspecialchars($offer['blurb']); ?></p>
        <?php endif; ?>
        <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="btn <?php echo $isBest ? 'btn-primary' : 'btn-outline-primary'; ?> btn-lg w-100">
          <?php echo htmlspecialchars($offer['cta_label'] ?? 'Choose offer'); ?>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (count($commitmentOffers) >= 2): ?>
<section class="timex-section pt-0">
  <div class="container">
    <div class="timex-savings-compare mx-auto">
      <h2 class="h3 fw-bold mb-2">Why pay more when you can save more?</h2>
      <p class="text-secondary mb-4">The longer you stay, the better your effective monthly price.</p>
      <div class="timex-savings-compare__rows">
        <?php if (!empty($offerByMonths[6]['monthly_label'])): ?>
        <div class="timex-savings-compare__row">
          <span>6 Months</span>
          <strong><?php echo htmlspecialchars($offerByMonths[6]['monthly_label']); ?>/month</strong>
        </div>
        <?php endif; ?>
        <?php if (!empty($offerByMonths[12]['monthly_label'])): ?>
        <div class="timex-savings-compare__row">
          <span>12 Months</span>
          <strong><?php echo htmlspecialchars($offerByMonths[12]['monthly_label']); ?>/month</strong>
        </div>
        <?php endif; ?>
      </div>
      <?php if ($monthlySavings): ?>
        <p class="timex-savings-compare__save mb-0">Save <?php echo htmlspecialchars($monthlySavings['label']); ?> every month with the 12-month offer.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="timex-section">
  <div class="container">
    <div class="timex-pricing-close mx-auto text-center">
      <h2 class="fw-bold">Everything included. Nothing complicated.</h2>
      <p class="text-secondary mx-auto mb-4">No confusing plan comparisons. No feature restrictions between plans. Just one complete Timex experience with an offer that fits your business.</p>
      <a href="<?php echo htmlspecialchars($stickyCta); ?>" class="btn btn-primary btn-lg px-4">Get Started with Timex</a>
      <p class="small text-secondary mt-3 mb-0">Prices and offers are subject to applicable taxes and offer terms.</p>
      <?php if (!$plansLive): ?>
        <p class="small text-secondary mt-2 mb-0">Showing fallback offer details while the live pricing catalog is unavailable.</p>
      <?php elseif ($resolved['source'] === 'cache'): ?>
        <p class="small text-secondary mt-2 mb-0">Offer details refreshed from catalog cache where available.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="timex-section pt-0">
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

<div class="timex-sticky-cta d-md-none" data-timex-sticky-cta hidden>
  <div class="timex-sticky-cta__inner">
    <div class="timex-sticky-cta__price">
      <strong data-sticky-price><?php echo htmlspecialchars($stickyPrice); ?></strong>
      <span data-sticky-unit><?php echo htmlspecialchars($stickyUnit); ?></span>
    </div>
    <a href="<?php echo htmlspecialchars($stickyCta); ?>" class="btn btn-primary btn-sm"><?php echo htmlspecialchars($stickyLabel); ?></a>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
