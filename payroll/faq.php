<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> / FAQ
    </nav>
    <div class="payroll-eyebrow">FAQ</div>
    <h1>Payroll software frequently asked questions</h1>
    <p>Practical answers about Maz Payroll—processing, salary components, statutory deductions, payslips, and more—based on what the product actually supports.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container" style="max-width:48rem;">
    <div class="accordion payroll-faq" id="payrollFaq">
      <?php foreach ($payroll_faq_items as $i => $faq): ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="fh<?php echo $i; ?>">
          <button class="accordion-button <?php echo $i ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#fc<?php echo $i; ?>" aria-expanded="<?php echo $i ? 'false' : 'true'; ?>" aria-controls="fc<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
          </button>
        </h2>
        <div id="fc<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i ? '' : 'show'; ?>" data-bs-parent="#payrollFaq">
          <div class="accordion-body text-secondary">
            <?php echo htmlspecialchars($faq['a']); ?>
            <?php if ($i === 4 || $i === 5 || $i === 6 || $i === 7): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(payroll_url('statutory-compliance')); ?>">Learn more about statutory compliance</a></div>
            <?php elseif ($i === 1): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(payroll_url('payroll-management')); ?>">See the payroll management workflow</a></div>
            <?php elseif ($i === 2 || $i === 10): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(payroll_url('salary-management')); ?>">Explore salary management</a></div>
            <?php elseif ($i === 8): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(payroll_url('payslips')); ?>">Read about payslips</a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="text-center mt-4 mb-0">
      Still have questions? <a href="<?php echo htmlspecialchars(payroll_url('contact')); ?>">Book a demo</a> or <a href="<?php echo htmlspecialchars(payroll_url('features')); ?>">browse features</a>.
    </p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
