<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(timex_url('features')); ?>">Features</a> / Leave &amp; OT
    </nav>
    <div class="timex-eyebrow">Leave, OT &amp; Regularization</div>
    <h1>Leave, overtime, and regularization software</h1>
    <p>Employees apply on mobile. Managers and HR approve in Timex. Policies, holidays, and punch corrections stay auditable—without printing payslips.</p>
  </div>
</section>

<section class="timex-section" id="leave">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Leave policies that write the day</h2>
        <p class="text-secondary">Apply → Pending manager → Pending HR (if required) → Approved or Rejected. Approved leave writes attendance so punches cannot overwrite it.</p>
        <ul class="text-secondary">
          <li>Leave types and leave policy (HR)</li>
          <li>Assign policy to employees</li>
          <li>Leave balance and leave calendar</li>
          <li>Half day: morning or afternoon</li>
          <li>Also: Draft, Cancelled, Expired</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-leave.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft" id="holidays">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Holidays</h2>
          <p class="text-secondary mb-0">HR publishes the holiday calendar. A published holiday wins over an auto-absent day when there are no punches.</p>
        </div>
      </div>
      <div class="col-lg-6" id="overtime">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Overtime</h2>
          <p class="text-secondary mb-0">OT comes from hours beyond the shift (if OT-eligible) or from employee requests. Types include Regular, Weekend, Holiday, Night shift, Emergency, and Compensatory off. After approval, Timex can mark OT processed for payroll or grant comp-off—it does not generate a payslip.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="timex-section" id="regularization">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Regularization for missing or wrong punches</h2>
        <p class="text-secondary">Request → Pending manager → Pending HR (if required) → Approved → Attendance day updated.</p>
        <ul class="text-secondary mb-0">
          <li>Missing check-in/out, late arrival, early exit, short hours</li>
          <li>Forgot to punch, official duty, client visit, WFH correction</li>
          <li>Travel, biometric failure, system error, manual attendance</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-attendance.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container text-center">
    <h2 class="h4 fw-bold mb-2">Timex owns time. Payroll owns pay.</h2>
    <p class="text-secondary mx-auto mb-3" style="max-width:36rem;">Approved leave and processed overtime are the handoff to salary runs—not payslips from Timex.</p>
    <a href="<?php echo htmlspecialchars(TIMEX_PAYROLL_URL); ?>" class="btn btn-outline-primary">See Maz Payroll</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
