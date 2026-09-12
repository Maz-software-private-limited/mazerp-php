<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(timex_url('features')); ?>">Features</a> / Employee Management
    </nav>
    <div class="timex-eyebrow">Employee Management</div>
    <h1>Employee workforce management software</h1>
    <p>Capture, organize, and keep a single employee master for time—department, shift, locations, and mobile login ready for every working day.</p>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Employee profiles built for attendance</h2>
        <p class="text-secondary">Maz Timex employee records are the roster HR uses for punch, leave, and reports—not a payroll salary sheet.</p>
        <ul class="text-secondary">
          <li>Name, code, contact, and status</li>
          <li>Department, designation, team, and reporting manager</li>
          <li>Shift assignment and one or more office locations</li>
          <li>Employee App credentials for mobile punch and leave</li>
          <li>Active roster and inactive list when someone leaves</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-employee.php'; ?></div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Organisation structure</h2>
          <p class="text-secondary mb-0">Departments, designations, and teams keep dashboards and reports filterable. Employees must be reassigned before a designation is deleted.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Shift &amp; location assignment</h2>
          <p class="text-secondary mb-0">Assign the shift that defines working rules and the geo-fenced offices where punch is valid. Learn more on <a href="<?php echo htmlspecialchars(timex_url('shift-management')); ?>">shifts &amp; locations</a>.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Mobile login</h2>
          <p class="text-secondary mb-0">HR can set Employee App credentials on the employee record. Those logins are not portal user accounts—punch stays on mobile.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="timex-feature-card h-100">
          <h2 class="h5 fw-bold">Active → Inactive</h2>
          <p class="text-secondary mb-0">Active employees can punch, apply leave, and appear on live and reports. Inactive removes them from the working roster while history remains.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
