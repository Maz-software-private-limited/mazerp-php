<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(payroll_url('features')); ?>">Features</a> / Payslips
    </nav>
    <div class="payroll-eyebrow">Payslips</div>
    <h1>Online payslip software for clear salary breakdowns</h1>
    <p>Generate professional payslips after payroll is locked and paid—showing earnings, deductions, and employer contributions—and download PDF copies from the admin portal.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Payslips that match the payroll run</h2>
        <p class="text-secondary">Payments &amp; Payslips brings together ready-to-pay employees, payment history, and payslip generation so HR and finance share one monthly record.</p>
        <ul class="text-secondary">
          <li>Generate payslips after lock / pay stages</li>
          <li>Salary breakdown with earnings and deductions</li>
          <li>Employer contribution lines where configured</li>
          <li>Admin PDF download for distribution</li>
        </ul>
        <p class="small text-secondary">Employee self-service payslip login is not part of the current product. Teams download payslips from the admin Payments &amp; Payslips area.</p>
        <a href="<?php echo htmlspecialchars(payroll_url('payroll-management')); ?>">See how payroll processing leads to payslips</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-payslip.php'; ?></div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="payroll-payslip h-100">
          <div class="payroll-payslip-head">
            <div>
              <div class="fw-bold">Sample payslip</div>
              <div class="small text-secondary">Illustrative layout</div>
            </div>
            <div class="small text-end text-secondary">Mar 2026</div>
          </div>
          <div class="payroll-line"><span>Gross earnings</span><span>₹70,000</span></div>
          <div class="payroll-line"><span>Total deductions</span><span>₹4,400</span></div>
          <div class="payroll-line total"><span>Net pay</span><span>₹65,600</span></div>
        </div>
      </div>
      <div class="col-md-8">
        <h2 class="h5 fw-bold">What employees and finance see on a payslip</h2>
        <p class="text-secondary">A typical payslip reflects the components from the employee’s salary structure for that run—basic and allowances as earnings, statutory and other deductions, and employer contributions summarised for cost visibility.</p>
        <p class="text-secondary mb-0">For related reporting, open the <a href="<?php echo htmlspecialchars(payroll_url('payroll-reports')); ?>">payroll reports</a> page.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
