<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(timex_url('features')); ?>">Features</a> / Reports
    </nav>
    <div class="timex-eyebrow">Workforce Reports</div>
    <h1>Workforce reports and analytics software</h1>
    <p>Daily attendance, hours, leave, overtime, location exceptions, and monthly summaries that feed payroll—without salary registers in Timex.</p>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Reports hub + live dashboard</h2>
        <p class="text-secondary">HR and managers get the views they need for operations and month-end handoff to Payroll.</p>
        <ul class="text-secondary">
          <li>Daily attendance (Present / Late / Absent)</li>
          <li>Attendance summary by employee</li>
          <li>Shift report and working hours</li>
          <li>Monthly attendance (payroll-oriented summary)</li>
          <li>Late and early checkout, missing punch</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-reports.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Leave, OT, holidays</h2>
          <p class="text-secondary mb-0">Leave (approved / pending / rejected), overtime, regularization, and holiday reports from one hub.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Location &amp; exceptions</h2>
          <p class="text-secondary mb-0">Location tracking and geo-fence / policy breach exceptions for field and office teams.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Dashboard KPIs</h2>
          <p class="text-secondary mb-0">Headcount, present / absent, on leave, overtime, pending leave and OT, department mix, birthdays, upcoming holidays.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="timex-section">
  <div class="container text-center">
    <h2 class="h4 fw-bold mb-2">Payroll, payslips, and salary registers stay in Payroll</h2>
    <p class="text-secondary mx-auto mb-3" style="max-width:36rem;">Timex produces payroll-ready attendance. Run salary in Maz Payroll from present days, approved leave, and processed OT.</p>
    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="<?php echo htmlspecialchars(TIMEX_PAYROLL_URL); ?>" class="btn btn-outline-primary">Maz Payroll</a>
      <a href="<?php echo htmlspecialchars(timex_url('pricing')); ?>" class="btn btn-primary">See Timex pricing</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
