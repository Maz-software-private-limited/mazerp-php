<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> / Follow-ups
    </nav>
    <div class="crm-eyebrow">Follow-ups</div>
    <h1>Follow-up and reminder software for sales teams</h1>
    <p>Keep today and overdue work visible. Log attempts against leads and deals so conversations do not go cold when ownership changes.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5 mb-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Never miss the next call</h2>
        <p class="text-secondary">Today and overdue queues keep telecallers focused. Each follow-up sits on the lead or deal, not in a private notebook.</p>
        <ul class="text-secondary">
          <li>Due today and overdue lists</li>
          <li>Assigned owner on every reminder</li>
          <li>Attempt history that survives a handover</li>
          <li>Tasks tied to the same record</li>
        </ul>
        <a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>">See how follow-ups feed the pipeline</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-followups.php'; ?></div>
    </div>

    <div class="row g-4">
      <div class="col-md-6" id="tasks">
        <div class="crm-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-list-check" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">Tasks &amp; activities</h2>
          <p class="text-secondary mb-0">Assign work such as send quote, book demo, or WhatsApp check-in. Activity stays on the lead or deal so managers can see what is promised versus done.</p>
        </div>
      </div>
      <div class="col-md-6" id="reminders">
        <div class="crm-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-bell" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">Reminders</h2>
          <p class="text-secondary mb-0">Schedule the next touch when you log an attempt. Overdue items surface at the top of the queue instead of disappearing into chat history.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="crm-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-people-arrows" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">Handovers</h2>
          <p class="text-secondary mb-0">When a lead changes owner, the follow-up log and notes move with it. Pair this with <a href="<?php echo htmlspecialchars(crm_url('customer-management')); ?>">customer management</a> after the deal is won.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="crm-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-mobile-screen" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">Mobile follow-ups</h2>
          <p class="text-secondary mb-0">Field reps can update due items from a modern mobile browser—same queues, same records as the office.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
