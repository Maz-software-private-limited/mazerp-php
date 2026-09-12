<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> / Sales Pipeline
    </nav>
    <div class="crm-eyebrow">Sales Pipeline</div>
    <h1>Run deals with a complete, visual workflow</h1>
    <p>Maz CRM connects lead capture, follow-ups, deal stages, owners, and expected value so managers can see what is moving—and what is stuck.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold mb-3">How pipeline processing works</h2>
        <div class="crm-workflow">
          <?php
          $workflow = [
            ['Capture the inquiry', 'Leads arrive from website, WhatsApp, walk-ins, or import.'],
            ['Assign an owner', 'Give the record to the right telecaller or field rep.'],
            ['Qualify the lead', 'Update status and expected value as the conversation progresses.'],
            ['Open a deal', 'Move qualified work onto the pipeline with a clear stage.'],
            ['Follow up on time', 'Log attempts and keep the next activity on the deal.'],
            ['Advance stages', 'New, qualified, proposal, and won—visible to the manager.'],
            ['Win and convert', 'Turn the deal into a customer record with history intact.'],
            ['Review the board', 'Open pipeline value and aging tell you where to coach.'],
          ];
          foreach ($workflow as $item):
          ?>
          <div class="crm-workflow-item">
            <h3 class="h6 fw-bold mb-1"><?php echo htmlspecialchars($item[0]); ?></h3>
            <p class="small text-secondary mb-0"><?php echo htmlspecialchars($item[1]); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-pipeline.php'; ?>
        <div class="mt-4">
          <?php include __DIR__ . '/includes/mockups/mockup-leads.php'; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Stages</h2>
          <p class="small text-secondary mb-0">Visual columns so every deal has a place. Managers scan the board instead of asking for a status spreadsheet.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Owners &amp; value</h2>
          <p class="small text-secondary mb-0">Each deal keeps an owner and expected value so coaching and forecast stay on the same screen.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="crm-feature-card h-100">
          <h2 class="h5 fw-bold">Next activity</h2>
          <p class="small text-secondary mb-0">Follow-ups and tasks attach to the deal. A silent column is a coaching cue, not a surprise at month end.</p>
        </div>
      </div>
    </div>
    <div class="mt-4 d-flex flex-wrap gap-3">
      <a href="<?php echo htmlspecialchars(crm_url('lead-management')); ?>">Lead management</a>
      <a href="<?php echo htmlspecialchars(crm_url('follow-ups')); ?>">Follow-ups</a>
      <a href="<?php echo htmlspecialchars(crm_url('customer-management')); ?>">Customer management</a>
      <a href="<?php echo htmlspecialchars(crm_url('crm-reports')); ?>">Reports</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
