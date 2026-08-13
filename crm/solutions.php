<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$solutions = [
    ['retail', 'fa-store', 'Retail', 'Turn walk-ins into repeat customers', 'Capture interest at the counter, follow up on pending purchases, and keep customer history next to every sale.', 'mockup-contact.php', false],
    ['real-estate', 'fa-house', 'Real Estate', 'Long cycles, clear next steps', 'Site visits, callbacks, and document follow-ups stay on a shared pipeline.', 'mockup-pipeline.php', true],
    ['agencies', 'fa-bullhorn', 'Agencies', 'Pitches and retainers in one pipeline', 'Track prospects, proposals, and account handovers without losing context.', 'mockup-leads.php', false],
    ['service', 'fa-screwdriver-wrench', 'Service Businesses', 'Callbacks and jobs without sticky notes', 'Service requests become leads and tasks with follow-ups that keep quotes moving.', 'mockup-followups.php', true],
    ['distributors', 'fa-truck', 'Distributors', 'Retailer relationships and collections', 'Know who has not ordered, who is over credit, and which rep owns the account.', 'mockup-report.php', false],
    ['b2b', 'fa-handshake', 'B2B Sales Teams', 'Quotes, stages, and field performance', 'Give field reps mobile access while managers track conversion from HQ.', 'mockup-pipeline.php', true],
];
?>

<section class="crm-page-hero">
  <div class="container">
    <div class="crm-eyebrow">Solutions</div>
    <h1>CRM solutions by industry</h1>
    <p>Maz CRM adapts to how you sell — retail counters, site visits, agency pitches, distributor routes, and B2B pipelines.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <?php foreach ($solutions as $s): ?>
      <div class="row align-items-center g-4 g-lg-5 mb-5 <?php echo $s[6] ? 'flex-lg-row-reverse' : ''; ?>" id="<?php echo htmlspecialchars($s[0]); ?>">
        <div class="col-lg-5">
          <div class="crm-eyebrow mb-2"><i class="fa-solid <?php echo htmlspecialchars($s[1]); ?> me-1"></i> <?php echo htmlspecialchars($s[2]); ?></div>
          <h2 class="fw-bold h3"><?php echo htmlspecialchars($s[3]); ?></h2>
          <p class="text-secondary"><?php echo htmlspecialchars($s[4]); ?></p>
          <a href="demo.php" class="btn btn-primary px-4">Book Demo</a>
          <a href="signup.php" class="btn btn-outline-primary px-4 ms-2">Start Free</a>
        </div>
        <div class="col-lg-7">
          <?php include __DIR__ . '/includes/mockups/' . $s[5]; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
