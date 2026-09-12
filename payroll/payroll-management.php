<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> / Payroll Management
    </nav>
    <div class="payroll-eyebrow">Payroll Management</div>
    <h1>Run payroll with a complete, controlled workflow</h1>
    <p>Maz Payroll connects employee setup, salary configuration, attendance, leave, statutory deductions, review, processing, and payslip generation into one monthly process.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold mb-3">How payroll processing works</h2>
        <div class="payroll-workflow">
          <?php
          $workflow = [
            ['Employee setup', 'Add employees with employment, bank, PAN, and statutory details.'],
            ['Salary configuration', 'Create components and structures, then assign CTC.'],
            ['Attendance & leave', 'Capture working days, leave, and LOP that affect payable salary.'],
            ['Payroll calculation', 'Create a payroll run and process calculations for the month.'],
            ['Statutory deductions & contributions', 'Include configured EPF, ESI, PT, and related employer lines.'],
            ['Payroll review', 'Open employee run details to verify earnings, deductions, and days.'],
            ['Approve, lock & pay', 'Move the run through approval, lock, and payment stages.'],
            ['Payslip generation', 'Generate PDF payslips from Payments & Payslips after the run is ready.'],
          ];
          foreach ($workflow as $item):
          ?>
          <div class="payroll-workflow-item">
            <h3 class="h6 fw-bold mb-1"><?php echo htmlspecialchars($item[0]); ?></h3>
            <p class="small text-secondary mb-0"><?php echo htmlspecialchars($item[1]); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-run.php'; ?>
        <div class="mt-4">
          <?php include __DIR__ . '/includes/mockups/mockup-dashboard.php'; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Payroll Month</h2>
          <p class="small text-secondary mb-0">Review the period, KPIs, and lock attendance or leave inputs when you are ready to calculate.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Payroll Runs</h2>
          <p class="small text-secondary mb-0">Process drafts into calculated runs, recalculate when inputs change, then approve and lock.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Payments &amp; Payslips</h2>
          <p class="small text-secondary mb-0">Mark payments and generate payslip PDFs for employees included in the run.</p>
        </div>
      </div>
    </div>
    <div class="mt-4 d-flex flex-wrap gap-3">
      <a href="<?php echo htmlspecialchars(payroll_url('employee-management')); ?>">Employee management</a>
      <a href="<?php echo htmlspecialchars(payroll_url('salary-management')); ?>">Salary management</a>
      <a href="<?php echo htmlspecialchars(payroll_url('statutory-compliance')); ?>">Statutory compliance</a>
      <a href="<?php echo htmlspecialchars(payroll_url('payslips')); ?>">Payslips</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
