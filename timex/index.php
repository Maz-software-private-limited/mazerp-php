<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-hero-home">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="timex-eyebrow mb-2">Maz Timex</div>
        <h1 class="mb-3">Workforce Time Made Clear</h1>
        <p class="lead mb-4">Manage employees, shifts, live punch, leave, overtime, and reports from one cloud workspace—then hand payroll-ready attendance to Maz Payroll.</p>
        <div class="d-flex flex-wrap gap-2 mb-3">
          <a href="<?php echo htmlspecialchars(TIMEX_SIGNUP_URL); ?>" class="btn btn-primary btn-lg px-4">Start Free</a>
          <a href="<?php echo htmlspecialchars(timex_url('contact')); ?>" class="btn btn-outline-primary btn-lg px-4">Book a Demo</a>
        </div>
        <p class="small text-secondary mb-0">Built for HR and managers who need accurate attendance without running salary in the same product.</p>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-dashboard.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="timex-eyebrow">Why Maz Timex</div>
      <h2 class="fw-bold">Clearer attendance. Cleaner handoff to payroll.</h2>
      <p class="section-lead">Replace scattered punch sheets with a structured workforce loop—from employee setup to payroll-ready reports.</p>
    </div>
    <div class="row g-3">
      <?php
      $benefits = [
        ['fa-mobile-screen', 'Mobile punch with QR & GPS', 'Employees check in and out on the Employee Mobile App by scanning the office QR and sharing location.'],
        ['fa-tower-broadcast', 'Live attendance board', 'See who is in, late, or still open—so supervisors catch gaps during the day, not at month end.'],
        ['fa-clock', 'Shifts that define the day', 'Working hours, weekly offs, grace minutes, and OT rules turn each calendar day into clear attendance status.'],
        ['fa-umbrella-beach', 'Leave & OT approvals', 'Employees apply from mobile. Managers and HR approve in Timex with policies and balances in one place.'],
        ['fa-screwdriver-wrench', 'Regularization that stays auditable', 'Fix missing or wrong punches through approval workflows—not silent edits to the attendance engine.'],
        ['fa-file-export', 'Payroll-ready attendance', 'Present days, approved leave, and processed OT hand off cleanly to Maz Payroll. Timex does not run payslips.'],
      ];
      foreach ($benefits as $b):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="timex-benefit">
          <i class="fa-solid <?php echo htmlspecialchars($b[0]); ?>" aria-hidden="true"></i>
          <div>
            <h3 class="h6 fw-bold mb-1"><?php echo htmlspecialchars($b[1]); ?></h3>
            <p class="small text-secondary mb-0"><?php echo htmlspecialchars($b[2]); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <div class="timex-eyebrow">Capabilities</div>
      <h2 class="fw-bold">Everything you need to manage workforce time</h2>
      <p class="section-lead">Explore the modules that power Maz Timex—based on the product teams use every day.</p>
    </div>
    <div class="row g-3">
      <?php
      $features = [
        ['employees', 'fa-users', 'Employee Management', 'Roster, department, team, manager, shift, locations, and mobile login.', timex_url('employee-management')],
        ['shifts', 'fa-clock', 'Shifts & Locations', 'Working hours, weekly offs, grace, OT rules, and geo-fenced offices.', timex_url('shift-management')],
        ['attendance', 'fa-calendar-check', 'Live Attendance', 'QR + GPS punch, live board, day status, calendar, and punch logs.', timex_url('attendance-management')],
        ['leave', 'fa-umbrella-beach', 'Leave & Holidays', 'Policies, balances, calendar, and manager/HR approval.', timex_url('leave-management')],
        ['ot', 'fa-business-time', 'Overtime & Regularization', 'OT requests, policies, and punch corrections with approval.', timex_url('leave-management') . '#overtime'],
        ['reports', 'fa-chart-column', 'Workforce Reports', 'Attendance, hours, leave, OT, location, and monthly summaries.', timex_url('workforce-reports')],
        ['live', 'fa-tower-broadcast', 'Live Board & Devices', 'Who is in right now, plus QR kiosks per office.', timex_url('attendance-management') . '#live'],
        ['payroll', 'fa-handshake', 'Payroll Handoff', 'Timex owns time. Payroll owns pay—clear attendance inputs for salary.', TIMEX_PAYROLL_URL],
      ];
      foreach ($features as $f):
      ?>
      <div class="col-md-6 col-lg-3">
        <a class="timex-feature-card d-block h-100 text-decoration-none" href="<?php echo htmlspecialchars($f[4]); ?>">
          <i class="fa-solid <?php echo htmlspecialchars($f[1]); ?> mb-2" aria-hidden="true"></i>
          <h3 class="h6 fw-bold mb-1"><?php echo htmlspecialchars($f[2]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($f[3]); ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="timex-eyebrow">How Timex Works</div>
      <h2 class="fw-bold">From hire to payroll-ready attendance</h2>
      <p class="section-lead">One clear loop for every working day—without mixing time and pay.</p>
    </div>
    <div class="row g-3">
      <?php
      $steps = [
        ['1', 'Employee', 'HR adds the person: department, designation, team, manager, shift, locations, and mobile login.'],
        ['2', 'Shift & location', 'Working hours, weekly offs, grace, and geo-fenced offices define a valid day. QR devices sit at the office.'],
        ['3', 'Check-in / check-out', 'Employees punch only on the Employee Mobile App—scan the office QR and share GPS.'],
        ['4', 'Day status', 'The engine marks Present, Absent, Half day, Leave, Holiday, Weekly off, or On duty.'],
        ['5', 'Leave / OT / regularization', 'Employees request from mobile. HR sets policies and balances in Timex.'],
        ['6', 'Approval', 'Manager, then HR when policy requires it. Approved leave writes the day; approved OT is ready to process.'],
        ['7', 'Reports to Payroll', 'Daily attendance, hours, leave, OT, and location. Present days and processed OT hand off to Payroll.'],
      ];
      foreach ($steps as $s):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="timex-step">
          <div class="timex-step-num"><?php echo htmlspecialchars($s[0]); ?></div>
          <h3 class="h6 fw-bold mb-1"><?php echo htmlspecialchars($s[1]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($s[2]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="timex-eyebrow">Live Attendance</div>
        <h2 class="fw-bold">QR at the office. GPS on the phone. Live board for HR.</h2>
        <p class="text-secondary">Employees punch only in the Employee Mobile App. Office staff scan a location QR inside the geo-fence. Supervisors watch who is in, late, or still open on the live board.</p>
        <ul class="text-secondary mb-0">
          <li>One check-in and one check-out per attendance date</li>
          <li>Late and early exit recorded as minutes after grace</li>
          <li>Location tracking can warn or auto check-out when leaving the fence</li>
        </ul>
        <a href="<?php echo htmlspecialchars(timex_url('attendance-management')); ?>" class="btn btn-outline-primary mt-3">Explore attendance</a>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-live.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="timex-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5 flex-lg-row-reverse">
      <div class="col-lg-5">
        <div class="timex-eyebrow">Leave, OT &amp; Regularization</div>
        <h2 class="fw-bold">Apply on mobile. Approve in Timex.</h2>
        <p class="text-secondary">Leave policies, holiday calendars, overtime, and punch corrections stay in Timex. Approved leave writes the attendance day. Processed OT is ready for payroll or compensatory off—Timex does not print payslips.</p>
        <a href="<?php echo htmlspecialchars(timex_url('leave-management')); ?>" class="btn btn-outline-primary mt-2">Explore leave &amp; OT</a>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-leave.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="timex-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <div class="timex-eyebrow">Product Preview</div>
      <h2 class="fw-bold">See Timex in action</h2>
      <p class="section-lead">A quick look at the screens HR and managers use every day.</p>
    </div>
    <div class="timex-preview-tabs d-flex flex-wrap justify-content-center gap-2 mb-4">
      <button type="button" class="btn btn-sm btn-outline-primary active" data-timex-panel="dashboard">Dashboard</button>
      <button type="button" class="btn btn-sm btn-outline-primary" data-timex-panel="live">Live</button>
      <button type="button" class="btn btn-sm btn-outline-primary" data-timex-panel="attendance">Attendance</button>
      <button type="button" class="btn btn-sm btn-outline-primary" data-timex-panel="reports">Reports</button>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div data-timex-panel-target="dashboard">
          <?php include __DIR__ . '/includes/mockups/mockup-dashboard.php'; ?>
        </div>
        <div data-timex-panel-target="live" hidden>
          <?php include __DIR__ . '/includes/mockups/mockup-live.php'; ?>
        </div>
        <div data-timex-panel-target="attendance" hidden>
          <?php include __DIR__ . '/includes/mockups/mockup-attendance.php'; ?>
        </div>
        <div data-timex-panel-target="reports" hidden>
          <?php include __DIR__ . '/includes/mockups/mockup-reports.php'; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
