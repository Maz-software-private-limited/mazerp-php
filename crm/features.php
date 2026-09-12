<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> / Features
    </nav>
    <div class="crm-eyebrow">Features</div>
    <h1>CRM software features for modern sales teams</h1>
    <p>From lead capture and customer records to pipeline, follow-ups, tasks, team access, and reports—see what Maz CRM includes.</p>
  </div>
</section>

<section class="crm-section" id="leads">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Lead Management</h2>
        <p class="text-secondary">Capture every inquiry and keep ownership clear.</p>
        <ul class="text-secondary">
          <li>Website forms, WhatsApp, walk-ins, and CSV imports</li>
          <li>Owner assignment and lead status</li>
          <li>Source tracking for later reporting</li>
          <li>Queue views so new inquiries do not sit unowned</li>
        </ul>
        <a href="<?php echo htmlspecialchars(crm_url('lead-management')); ?>">Explore lead management</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-leads.php'; ?></div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft" id="customers">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 order-lg-2"><?php include __DIR__ . '/includes/mockups/mockup-contact.php'; ?></div>
      <div class="col-lg-5 order-lg-1">
        <h2 class="fw-bold">Customer Management</h2>
        <p class="text-secondary">Converted leads become records that remember the conversation.</p>
        <ul class="text-secondary">
          <li>Profiles with contact and company details</li>
          <li>Outstanding context and status</li>
          <li>Communication timeline on the record</li>
          <li>Handovers that do not start from scratch</li>
        </ul>
        <a href="<?php echo htmlspecialchars(crm_url('customer-management')); ?>">Explore customer management</a>
      </div>
    </div>
  </div>
</section>

<section class="crm-section" id="pipeline">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Sales Pipeline</h2>
        <p class="text-secondary">Run deals with stages instead of ad-hoc chats and spreadsheets.</p>
        <ul class="text-secondary">
          <li>Visual stages from new to won</li>
          <li>Owner, expected value, and next step on each deal</li>
          <li>Open pipeline totals for coaching and forecast</li>
        </ul>
        <a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>">Explore sales pipeline</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-pipeline.php'; ?></div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft" id="followups">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="fw-bold">Follow-ups &amp; Reminders</h2>
        <p class="text-secondary">Keep the next call visible for the whole team.</p>
        <ul class="text-secondary mb-0">
          <li>Today and overdue queues</li>
          <li>Attempt logs against leads and deals</li>
          <li>Reminders that survive a handover</li>
        </ul>
      </div>
      <div class="col-lg-6" id="tasks">
        <h2 class="fw-bold">Tasks &amp; Activities</h2>
        <p class="text-secondary">Turn promises into tracked work on the right record.</p>
        <ul class="text-secondary mb-3">
          <li>Assign tasks to agents</li>
          <li>Activity history tied to leads and deals</li>
          <li>Manager visibility into what is due</li>
        </ul>
        <a href="<?php echo htmlspecialchars(crm_url('follow-ups')); ?>">Read about follow-ups</a>
      </div>
    </div>
  </div>
</section>

<section class="crm-section" id="reports">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 order-lg-2"><?php include __DIR__ . '/includes/mockups/mockup-report.php'; ?></div>
      <div class="col-lg-5 order-lg-1">
        <h2 class="fw-bold">Reports</h2>
        <p class="text-secondary">Lead sources, conversion, aging, pipeline value, and team performance—ready when leadership asks. Some advanced views may depend on your plan.</p>
        <a href="<?php echo htmlspecialchars(crm_url('crm-reports')); ?>">View CRM reports</a>
      </div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft" id="team">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Team</div>
      <h2 class="fw-bold">Roles that match how you sell</h2>
    </div>
    <div class="row g-3">
      <?php
      $settings = [
        ['Telecallers', 'Work from follow-up queues and log attempts against assigned leads.'],
        ['Field reps', 'Update leads and next steps from a mobile browser.'],
        ['Managers', 'See pipeline, aging, and who owns each deal.'],
        ['Ownership', 'Assign leads and deals so work is never unowned.'],
        ['Access', 'Give each role the screens they need as the team grows.'],
      ];
      foreach ($settings as $s):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="crm-feature-card h-100">
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($s[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($s[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
