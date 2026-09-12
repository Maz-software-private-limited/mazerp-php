<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(timex_url('features')); ?>">Features</a> / Attendance
    </nav>
    <div class="timex-eyebrow">Attendance Management</div>
    <h1>Live attendance and mobile punch software</h1>
    <p>QR at the office, GPS on the phone, a live board for supervisors, and a day status engine that produces payroll-ready attendance.</p>
  </div>
</section>

<section class="timex-section" id="live">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">How people punch</h2>
        <p class="text-secondary">Employees punch only in the Employee Mobile App. Portal scan-and-punch is not used.</p>
        <ul class="text-secondary">
          <li>Office staff scan a location QR and must be inside the geo-fence</li>
          <li>Field staff can punch with GPS where policy allows QR to be optional</li>
          <li>One check-in and one check-out per attendance date</li>
          <li>Supervisors watch the live board for who is in, late, or still open</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-live.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5 flex-lg-row-reverse">
      <div class="col-lg-5">
        <h2 class="fw-bold">Day status the engine finalizes</h2>
        <p class="text-secondary">After check-in and check-out, Timex marks the day so HR and payroll get consistent inputs.</p>
        <ul class="text-secondary mb-0">
          <li><strong>Present</strong> — valid check-in; late minutes can still apply</li>
          <li><strong>Absent</strong> — no check-in, or hours below the half-day threshold</li>
          <li><strong>Half day</strong> — enough for half day but below full-day minimum</li>
          <li><strong>Leave / Holiday / Weekly off / On duty</strong> — policy and calendar driven</li>
        </ul>
        <p class="small text-secondary mt-3 mb-0">Late and early exit are minutes (and flags) on a Present day after grace—not separate day statuses.</p>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-attendance.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Live board</h2>
          <p class="text-secondary mb-0">See who is checked in, late, or still open during the day—not only at month end.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Devices &amp; locations</h2>
          <p class="text-secondary mb-0">Manage QR kiosks per office and geo-fenced branches. Leaving the fence can warn or auto check-out.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Calendar &amp; punch logs</h2>
          <p class="text-secondary mb-0">HR reviews the day and location track from punch logs. Corrections go through <a href="<?php echo htmlspecialchars(timex_url('leave-management')); ?>#regularization">regularization</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
