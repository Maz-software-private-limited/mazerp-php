<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$show_prices = PAYROLL_SHOW_PRICES;
$pricing_faqs = [
  [
    'q' => 'Is pricing final on this page?',
    'a' => $show_prices
      ? 'Displayed amounts are current plan prices. Taxes may apply. Contact us if you need a custom quote for larger teams.'
      : 'Public list prices are configured when finalized. Use Start Free or Book a Demo to get current plan options for your employee count.',
  ],
  [
    'q' => 'Can I start without choosing a paid plan?',
    'a' => 'Yes. Use Start Free to begin in the product, or Book a Demo for a guided walkthrough of employees, salary, statutory components, and payroll runs.',
  ],
  [
    'q' => 'Do plans differ by statutory reports?',
    'a' => 'Core payroll includes EPF and ESI reporting. Professional Tax, TDS, overtime, and some advanced reports may depend on your plan or add-ons.',
  ],
  [
    'q' => 'Is there monthly and yearly billing?',
    'a' => 'The product supports monthly and yearly billing modes in-app. When public prices are published here, you can compare both on this page.',
  ],
];
?>

<section class="payroll-page-hero text-center">
  <div class="container">
    <nav class="payroll-breadcrumb justify-content-center" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> / Pricing
    </nav>
    <div class="payroll-eyebrow">Pricing</div>
    <h1>Payroll software pricing that scales with your team</h1>
    <p class="mx-auto">Compare capabilities across Starter, Growth, and Business. Start free or talk to us for a plan that matches your headcount.</p>
    <div class="payroll-billing-toggle mt-3" data-payroll-billing>
      <button type="button" class="btn active" data-billing="monthly">Monthly</button>
      <button type="button" class="btn" data-billing="yearly">Yearly</button>
    </div>
    <?php if (!$show_prices): ?>
      <p class="small text-secondary mt-3 mb-0">Prices will appear here once published. Plan features below are ready for configuration in <code>includes/config.php</code>.</p>
    <?php endif; ?>
  </div>
</section>

<section class="payroll-section pt-2">
  <div class="container">
    <div class="row g-3 g-lg-4">
      <?php foreach ($payroll_plans as $plan):
        $monthly = $show_prices && $plan['monthly'] !== '' ? $plan['monthly'] : '';
        $yearly = $show_prices && $plan['yearly'] !== '' ? $plan['yearly'] : '';
        $display = $monthly !== '' ? $monthly : 'Contact us';
        $unit = $monthly !== '' ? '/month' : '';
      ?>
      <div class="col-md-4">
        <div class="payroll-plan-card <?php echo !empty($plan['popular']) ? 'is-popular' : ''; ?>">
          <?php if (!empty($plan['popular'])): ?>
            <div class="payroll-popular-banner">MOST POPULAR</div>
          <?php endif; ?>
          <div class="payroll-plan-icon <?php echo htmlspecialchars($plan['icon']); ?>">
            <i class="fa-solid <?php echo htmlspecialchars($plan['icon_fa']); ?>" aria-hidden="true"></i>
          </div>
          <h2 class="h5 fw-bold"><?php echo htmlspecialchars($plan['name']); ?></h2>
          <p class="small text-secondary"><?php echo htmlspecialchars($plan['blurb']); ?></p>
          <div class="payroll-plan-price" data-price-monthly="<?php echo htmlspecialchars($monthly); ?>" data-price-yearly="<?php echo htmlspecialchars($yearly); ?>">
            <span data-price-value><?php echo htmlspecialchars($display); ?></span>
            <span class="fs-6 fw-normal text-secondary" data-price-unit><?php echo htmlspecialchars($unit); ?></span>
          </div>
          <ul class="payroll-plan-features">
            <?php foreach ($plan['features'] as $feat): ?>
              <li><?php echo htmlspecialchars($feat); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php if (!empty($plan['note'])): ?>
            <p class="small text-secondary"><?php echo htmlspecialchars($plan['note']); ?></p>
          <?php endif; ?>
          <div class="d-grid gap-2">
            <a href="<?php echo htmlspecialchars(PAYROLL_SIGNUP_URL); ?>" class="btn <?php echo !empty($plan['popular']) ? 'btn-primary' : 'btn-outline-primary'; ?>">Start Free</a>
            <a href="<?php echo htmlspecialchars(payroll_url('contact')); ?>" class="btn btn-link">Book a Demo</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">Feature comparison</h2>
      <p class="section-lead">A simple view of what each plan is designed for. Exact entitlements are confirmed at signup or during a demo.</p>
    </div>
    <div class="table-responsive">
      <table class="table payroll-compare-table align-middle bg-white border">
        <thead>
          <tr>
            <th scope="col">Capability</th>
            <th scope="col">Starter</th>
            <th scope="col">Growth</th>
            <th scope="col">Business</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rows = [
            ['Employees & salary assignment', 'Yes', 'Yes', 'Yes'],
            ['Payroll runs & payslips', 'Yes', 'Yes', 'Yes'],
            ['Attendance & leave', 'Yes', 'Yes', 'Yes'],
            ['EPF & ESI reports', 'Core', 'Yes', 'Yes'],
            ['PT / TDS / advanced reports', '—', 'Add-on capable', 'Add-on capable'],
            ['Guided onboarding', 'Standard', 'Priority', 'Dedicated'],
          ];
          foreach ($rows as $row):
          ?>
          <tr>
            <th scope="row"><?php echo htmlspecialchars($row[0]); ?></th>
            <td><?php echo htmlspecialchars($row[1]); ?></td>
            <td><?php echo htmlspecialchars($row[2]); ?></td>
            <td><?php echo htmlspecialchars($row[3]); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="payroll-section">
  <div class="container" style="max-width:44rem;">
    <h2 class="fw-bold text-center mb-4">Pricing FAQ</h2>
    <div class="accordion payroll-faq" id="pricingFaq">
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
