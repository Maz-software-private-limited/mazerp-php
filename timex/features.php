<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> / Features
    </nav>
    <div class="timex-eyebrow">Features</div>
    <h1>Workforce time features for modern teams</h1>
    <p>From employee setup and shifts to live punch, leave, overtime, regularization, and reports—see what Maz Timex includes.</p>
  </div>
</section>

<section class="timex-section" id="employees">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Employee Management</h2>
        <p class="text-secondary">Keep a single employee master for time—and later for pay in Payroll.</p>
        <ul class="text-secondary">
          <li>Profiles with code, contact, and status</li>
          <li>Department, designation, team, and reporting manager</li>
          <li>Shift and multi-location assignment</li>
          <li>Employee App credentials (not portal user accounts)</li>
          <li>Active and inactive roster views</li>
        </ul>
        <a href="<?php echo htmlspecialchars(timex_url('employee-management')); ?>">Explore employee management</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-employee.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft" id="shifts">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 order-lg-2"><?php include __DIR__ . '/includes/mockups/mockup-shift.php'; ?></div>
      <div class="col-lg-5 order-lg-1">
        <h2 class="fw-bold">Shifts &amp; Office Locations</h2>
        <p class="text-secondary">Turn each calendar day into clear working rules and valid punch sites.</p>
        <ul class="text-secondary">
          <li>Start/end times, including overnight shifts</li>
          <li>Working hours, half-day thresholds, and grace minutes</li>
          <li>Weekly offs and overtime eligibility</li>
          <li>Geo-fenced office locations with QR devices</li>
        </ul>
        <a href="<?php echo htmlspecialchars(timex_url('shift-management')); ?>">Explore shifts &amp; locations</a>
      </div>
    </div>
  </div>
</section>

<section class="timex-section" id="attendance">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Live Attendance</h2>
        <p class="text-secondary">Run the daily punch loop with mobile QR, GPS, and a live board for supervisors.</p>
        <ul class="text-secondary">
          <li>Employee Mobile App punch only—no portal scan-and-punch</li>
          <li>Live board: who is in, late, or still open</li>
          <li>Day status: Present, Absent, Half day, Leave, Holiday, Weekly off, On duty</li>
          <li>Calendar and punch logs for HR review</li>
        </ul>
        <a href="<?php echo htmlspecialchars(timex_url('attendance-management')); ?>">Explore attendance</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-attendance.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft" id="leave">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="fw-bold">Leave &amp; Holidays</h2>
        <p class="text-secondary">Policies live in Timex. Employees apply on mobile; managers and HR approve.</p>
        <ul class="text-secondary mb-0">
          <li>Leave types, policies, assignment, and balances</li>
          <li>Leave calendar and approval queue</li>
          <li>Half-day morning or afternoon</li>
          <li>Published holiday calendar that wins over auto-absent</li>
        </ul>
      </div>
      <div class="col-lg-6" id="overtime">
        <h2 class="fw-bold">Overtime &amp; Regularization</h2>
        <p class="text-secondary">Correct punches and settle extra hours without mixing time into payslips.</p>
        <ul class="text-secondary mb-3">
          <li>OT from attendance or employee requests</li>
          <li>Manager/HR approval, then payroll or compensatory off</li>
          <li>Regularization for missing or wrong punches</li>
          <li>Auditable updates to the attendance day</li>
        </ul>
        <a href="<?php echo htmlspecialchars(timex_url('leave-management')); ?>">Explore leave &amp; OT</a>
      </div>
    </div>
  </div>
</section>

<section class="timex-section" id="reports">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 order-lg-2"><?php include __DIR__ . '/includes/mockups/mockup-reports.php'; ?></div>
      <div class="col-lg-5 order-lg-1">
        <h2 class="fw-bold">Workforce Reports</h2>
        <p class="text-secondary">Daily attendance, hours, leave, OT, location exceptions, and monthly summaries that feed payroll.</p>
        <ul class="text-secondary">
          <li>Attendance, late/early, and missing punch reports</li>
          <li>Leave, overtime, and regularization reports</li>
          <li>Location tracking and exceptions</li>
          <li>Dashboard KPIs for headcount and pending approvals</li>
        </ul>
        <a href="<?php echo htmlspecialchars(timex_url('workforce-reports')); ?>">Explore reports</a>
      </div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft" id="settings">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Clear split with Payroll</h2>
        <p class="text-secondary mb-0">Timex owns time. Payroll owns pay. Present days, approved leave, and processed overtime are the handoff—not payslips from Timex. Run salary in <a href="<?php echo htmlspecialchars(TIMEX_PAYROLL_URL); ?>">Maz Payroll</a> from Timex attendance.</p>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-live.php'; ?></div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
