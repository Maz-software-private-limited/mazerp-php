<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(crm_url('features')); ?>">Features</a> / Customer Management
    </nav>
    <div class="crm-eyebrow">Customer Management</div>
    <h1>Customer management software with full history</h1>
    <p>Turn won leads into customer records that keep communication, outstanding context, and notes together—so sales and support share one source of truth.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Profiles that remember every conversation</h2>
        <p class="text-secondary">Converted leads become contacts with the history still attached. Agents pick up where the last person left off.</p>
        <ul class="text-secondary">
          <li>Company and contact details on one profile</li>
          <li>Status and outstanding context where captured</li>
          <li>Timeline of calls, notes, and follow-up attempts</li>
          <li>Handovers without restarting the relationship</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-contact.php'; ?></div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">From lead to customer</h2>
          <p class="small text-secondary mb-0">Wins keep the pipeline history. The same record continues as a customer instead of a disconnected spreadsheet row. See <a href="<?php echo htmlspecialchars(crm_url('lead-management')); ?>">lead management</a>.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Communication history</h2>
          <p class="small text-secondary mb-0">Calls, notes, and follow-ups stay on the record so any agent can continue the conversation.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Connected to reports</h2>
          <p class="small text-secondary mb-0">Customer and conversion views sit in the same reporting hub. Open <a href="<?php echo htmlspecialchars(crm_url('crm-reports')); ?>">CRM reports</a> for team and pipeline totals.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
