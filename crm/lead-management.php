<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(crm_url('features')); ?>">Features</a> / Lead Management
    </nav>
    <div class="crm-eyebrow">Lead Management</div>
    <h1>Lead management software for inbound sales</h1>
    <p>Keep every inquiry in one queue—with an owner, source, status, and next step—so new business does not live in spreadsheets or chat threads.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Capture, assign, and qualify in one list</h2>
        <p class="text-secondary">Maz CRM lead records go beyond a contact name. Capture what sales needs to follow up and convert.</p>
        <ul class="text-secondary">
          <li>Website forms, WhatsApp, walk-ins, referrals, and campaigns</li>
          <li>CSV or Excel import for existing lists</li>
          <li>Owner assignment so every lead has a responsible agent</li>
          <li>Status such as new, hot, qualified, or follow-up</li>
          <li>Expected value and source for later reporting</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-leads.php'; ?></div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Ownership that sticks</h2>
          <p class="text-secondary mb-0">Assign leads to telecallers or field reps. Managers can see unowned or aging records instead of hunting through a shared inbox.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Connected to follow-ups</h2>
          <p class="text-secondary mb-0">Schedule the next call from the lead. Attempt logs stay on the record so a handover does not lose context. See <a href="<?php echo htmlspecialchars(crm_url('follow-ups')); ?>">follow-ups</a>.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Into the pipeline</h2>
          <p class="text-secondary mb-0">Qualified leads become deals with stages and expected value. Continue on <a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>">sales pipeline</a>.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">What to expect</h2>
          <p class="text-secondary mb-0">Imports are file-based (Excel/CSV). Source and owner fields support reporting; exact scoring rules can depend on how your team configures statuses.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
