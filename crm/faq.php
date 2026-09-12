<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> / FAQ
    </nav>
    <div class="crm-eyebrow">FAQ</div>
    <h1>CRM software frequently asked questions</h1>
    <p>Practical answers about Maz CRM—leads, pipeline, follow-ups, imports, and reports—based on what the product actually supports.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container" style="max-width:48rem;">
    <div class="accordion crm-faq" id="crmFaq">
      <?php foreach ($crm_faq_items as $i => $faq): ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="fh<?php echo $i; ?>">
          <button class="accordion-button <?php echo $i ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#fc<?php echo $i; ?>" aria-expanded="<?php echo $i ? 'false' : 'true'; ?>" aria-controls="fc<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
          </button>
        </h2>
        <div id="fc<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i ? '' : 'show'; ?>" data-bs-parent="#crmFaq">
          <div class="accordion-body text-secondary">
            <?php echo htmlspecialchars($faq['a']); ?>
            <?php if ($i === 1 || $i === 2): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(crm_url('lead-management')); ?>">Explore lead management</a></div>
            <?php elseif ($i === 3): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>">See the sales pipeline</a></div>
            <?php elseif ($i === 4): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(crm_url('follow-ups')); ?>">Read about follow-ups</a></div>
            <?php elseif ($i === 7): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(crm_url('crm-reports')); ?>">View CRM reports</a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="text-center mt-4 mb-0">
      Still have questions? <a href="<?php echo htmlspecialchars(crm_url('contact')); ?>">Book a demo</a> or <a href="<?php echo htmlspecialchars(crm_url('features')); ?>">browse features</a>.
    </p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
