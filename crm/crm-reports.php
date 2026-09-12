<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$core_reports = [
  ['Lead Sources', 'Where inquiries come from—website, WhatsApp, walk-in, referral, campaign.'],
  ['Conversion', 'How many leads become qualified deals and won customers.'],
  ['Aging', 'Leads and deals sitting too long without a next activity.'],
  ['Pipeline Value', 'Open expected value by stage for coaching and forecast.'],
  ['Follow-up Completion', 'Today, overdue, and done rates for the team.'],
  ['Team Performance', 'New leads, conversion, and activity by owner.'],
];

$gated_reports = [
  ['Advanced analytics', 'Deeper conversion and funnel views depending on your plan.'],
  ['Custom fields in reports', 'Extra dimensions when custom fields are enabled.'],
];
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(crm_url('features')); ?>">Features</a> / CRM Reports
    </nav>
    <div class="crm-eyebrow">CRM Reports</div>
    <h1>CRM reports for sales and leadership reviews</h1>
    <p>Use the reports available in Maz CRM—sources, conversion, aging, pipeline, follow-ups, and team views—without inventing extras that are not in the product.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row align-items-center g-4 mb-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Reports hub</h2>
        <p class="text-secondary">Generate the views you need after a week of selling. Filters typically include date range, owner, and source where relevant.</p>
        <a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>">Pipeline context</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-report.php'; ?></div>
    </div>

    <h2 class="h4 fw-bold mb-3">Core reports</h2>
    <div class="row g-3 mb-4">
      <?php foreach ($core_reports as $r): ?>
      <div class="col-md-6 col-lg-4">
        <div class="crm-feature-card h-100">
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($r[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($r[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <h2 class="h4 fw-bold mb-3">Plan or add-on capable reports</h2>
    <p class="text-secondary small mb-3">These views may require advanced reporting depending on your subscription.</p>
    <div class="row g-3">
      <?php foreach ($gated_reports as $r): ?>
      <div class="col-md-6 col-lg-4">
        <div class="crm-feature-card h-100">
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($r[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($r[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
