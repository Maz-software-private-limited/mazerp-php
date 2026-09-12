<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(timex_url('features')); ?>">Features</a> / Shifts &amp; Locations
    </nav>
    <div class="timex-eyebrow">Shifts &amp; Locations</div>
    <h1>Shift and office location software</h1>
    <p>Define working hours, weekly offs, grace periods, overtime rules, and geo-fenced offices so every punch maps to a valid day.</p>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Shifts that turn a day into rules</h2>
        <p class="text-secondary">Shifts are the clock rules Timex uses to decide late, early, half day, and overtime eligibility.</p>
        <ul class="text-secondary">
          <li>Start and end time—including overnight shifts</li>
          <li>Working hours, minimum hours, and half-day hours</li>
          <li>Late grace and early-exit grace (minutes)</li>
          <li>Weekly off days</li>
          <li>Overtime eligibility, when OT starts, and a max OT cap</li>
          <li>Optional auto check-out if someone forgets to punch out</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-shift.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Assign employees</h2>
          <p class="text-secondary mb-0">Assign people to a shift so attendance, live board, and reports use the right working rules every day.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Geo-fenced offices</h2>
          <p class="text-secondary mb-0">Each branch can have a geo-fenced office location. Employees may be assigned to more than one site for valid punch.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">QR devices</h2>
          <p class="text-secondary mb-0">QR kiosks sit at the office—static or rotating codes. Staff scan from the Employee Mobile App inside the fence.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">What we do not lead with</h2>
          <p class="text-secondary mb-0">Optional schedule, rotation, and swap screens may exist behind feature flags. The default Timex story is shift assignment plus geo-fenced punch sites.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
