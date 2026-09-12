<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-hero-home">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="payroll-eyebrow mb-2">Maz Payroll</div>
        <h1 class="mb-3">Payroll Made Simple for Growing Businesses</h1>
        <p class="lead mb-4">Manage employees, salary structures, attendance, leave, statutory deductions, payslips, and payroll runs from one cloud platform built for Indian teams.</p>
        <div class="d-flex flex-wrap gap-2 mb-3">
          <a href="<?php echo htmlspecialchars(PAYROLL_SIGNUP_URL); ?>" class="btn btn-primary btn-lg px-4">Start Free</a>
          <a href="<?php echo htmlspecialchars(payroll_url('contact')); ?>" class="btn btn-outline-primary btn-lg px-4">Book a Demo</a>
        </div>
        <p class="small text-secondary mb-0">Built for HR, finance, accountants, and business owners who want clearer monthly payroll.</p>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-dashboard.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="payroll-eyebrow">Why Maz Payroll</div>
      <h2 class="fw-bold">Faster processing. Clearer calculations.</h2>
      <p class="section-lead">Replace scattered spreadsheets with a structured payroll workflow—from employee setup to payslip generation.</p>
    </div>
    <div class="row g-3">
      <?php
      $benefits = [
        ['fa-bolt', 'Faster payroll processing', 'Move from attendance inputs to calculated runs with a clear Process → Approve → Lock → Pay flow.'],
        ['fa-calculator', 'Accurate salary calculations', 'Use salary components, structures, and CTC assignments so earnings and deductions stay consistent.'],
        ['fa-user-check', 'Employee payroll records', 'Keep employment, bank, PAN, and statutory details with each employee for cleaner monthly runs.'],
        ['fa-scale-balanced', 'Statutory components', 'Help manage EPF, ESI, Professional Tax, and TDS amounts inside payroll calculations and reports.'],
        ['fa-file-invoice-dollar', 'Automated payslips', 'Generate PDF payslips after payroll is locked and paid—with earnings, deductions, and employer contributions.'],
        ['fa-chart-column', 'Payroll reports', 'Review salary registers, attendance summaries, LOP, EPF, ESI, and payment reports when you need them.'],
      ];
      foreach ($benefits as $b):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="payroll-benefit">
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

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <div class="payroll-eyebrow">Capabilities</div>
      <h2 class="fw-bold">Everything you need to manage payroll</h2>
      <p class="section-lead">Explore the modules that power Maz Payroll—based on the product teams use every month.</p>
    </div>
    <div class="row g-3">
      <?php
      $features = [
        ['employees', 'fa-users', 'Employee Management', 'Profiles, employment details, bank/IFSC, PAN, and PF/ESI fields.', payroll_url('employee-management')],
        ['salary', 'fa-layer-group', 'Salary Management', 'Components, structures, CTC, earnings, deductions, and employer contributions.', payroll_url('salary-management')],
        ['run', 'fa-coins', 'Payroll Processing', 'Payroll month, runs, review, approve, lock, and pay.', payroll_url('payroll-management')],
        ['attendance', 'fa-calendar-check', 'Attendance & Leave', 'Daily and monthly attendance, leave policies, balances, and payable days.', payroll_url('features') . '#attendance'],
        ['statutory', 'fa-scale-balanced', 'Statutory Payroll', 'EPF, ESI, Professional Tax, and TDS calculations with reports.', payroll_url('statutory-compliance')],
        ['payslips', 'fa-file-invoice-dollar', 'Payslips', 'Generate and download PDF payslips from Payments & Payslips.', payroll_url('payslips')],
        ['reports', 'fa-chart-column', 'Reports', 'Salary, attendance, statutory, and payment reports from one hub.', payroll_url('payroll-reports')],
        ['settings', 'fa-gear', 'Payroll Settings', 'Pay schedule, statutory setup, salary structures, departments, and shifts.', payroll_url('features') . '#settings'],
      ];
      foreach ($features as $f):
      ?>
      <div class="col-md-6 col-lg-3">
        <a href="<?php echo htmlspecialchars($f[4]); ?>" class="payroll-feature-card d-block h-100">
          <div class="fi"><i class="fa-solid <?php echo htmlspecialchars($f[1]); ?>" aria-hidden="true"></i></div>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($f[2]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($f[3]); ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="<?php echo htmlspecialchars(payroll_url('features')); ?>" class="btn btn-outline-primary">View all features</a>
    </div>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="payroll-eyebrow">How Payroll Works</div>
      <h2 class="fw-bold">A clear path from setup to payslips</h2>
    </div>
    <div class="row g-3">
      <?php
      $steps = [
        ['Add Employees', 'Create profiles with employment, bank, and statutory details.'],
        ['Configure Salary', 'Define components and structures, then assign CTC.'],
        ['Track Attendance & Leave', 'Capture daily/monthly attendance and leave for payable days.'],
        ['Run Payroll', 'Create a payroll run for the month and process calculations.'],
        ['Review Calculations', 'Check employee earnings, deductions, and employer lines.'],
        ['Generate Payslips', 'After lock and pay, generate PDF payslips for the run.'],
        ['Complete Processing', 'Use reports to review salary, statutory, and payment outcomes.'],
      ];
      foreach ($steps as $i => $step):
      ?>
      <div class="col-6 col-md-4 col-xl">
        <div class="payroll-step h-100 text-center">
          <div class="payroll-step-num"><?php echo $i + 1; ?></div>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($step[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($step[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="<?php echo htmlspecialchars(payroll_url('payroll-management')); ?>">See the full payroll management workflow</a>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="payroll-eyebrow">Statutory Compliance</div>
        <h2 class="fw-bold mb-3">Help manage EPF, ESI, PT, and TDS in payroll</h2>
        <p class="text-secondary mb-3">Configure organisation statutory settings, capture employee identifiers where needed, include amounts in payroll calculations, and review dedicated reports.</p>
        <p class="small text-secondary mb-3">Maz Payroll helps you manage statutory payroll components. It does not e-file government returns, and statutory rules can change—always verify requirements for your business.</p>
        <a href="<?php echo htmlspecialchars(payroll_url('statutory-compliance')); ?>" class="btn btn-outline-primary">Explore statutory compliance</a>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-statutory.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-7 order-lg-2">
        <?php include __DIR__ . '/includes/mockups/mockup-payslip.php'; ?>
      </div>
      <div class="col-lg-5 order-lg-1">
        <div class="payroll-eyebrow">Employee Payroll Records</div>
        <h2 class="fw-bold mb-3">Keep salary, payslips, and attendance data organised</h2>
        <p class="text-secondary mb-3">Maintain employee salary breakdowns, generate payslips after payroll is paid, and keep leave and attendance inputs connected to payable days—so HR and finance share one source of truth.</p>
        <ul class="text-secondary small mb-4">
          <li class="mb-2">Payslip PDF generation from Payments &amp; Payslips</li>
          <li class="mb-2">Salary structure and CTC on each employee</li>
          <li class="mb-2">Attendance and leave that feed payroll calculations</li>
        </ul>
        <a href="<?php echo htmlspecialchars(payroll_url('payslips')); ?>" class="btn btn-outline-primary">Learn about payslips</a>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft" id="preview">
  <div class="container">
    <div class="text-center mb-4">
      <div class="payroll-eyebrow">Product Preview</div>
      <h2 class="fw-bold">See how Maz Payroll looks in practice</h2>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3" role="tablist" aria-label="Product preview">
      <button type="button" class="btn btn-primary btn-sm px-3" data-payroll-panel="dashboard">Dashboard</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-payroll-panel="run">Payroll Runs</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-payroll-panel="employee">Employees</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-payroll-panel="reports">Reports</button>
    </div>
    <div data-payroll-panel-target="dashboard"><?php include __DIR__ . '/includes/mockups/mockup-dashboard.php'; ?></div>
    <div data-payroll-panel-target="run" hidden><?php include __DIR__ . '/includes/mockups/mockup-run.php'; ?></div>
    <div data-payroll-panel-target="employee" hidden><?php include __DIR__ . '/includes/mockups/mockup-employee.php'; ?></div>
    <div data-payroll-panel-target="reports" hidden><?php include __DIR__ . '/includes/mockups/mockup-reports.php'; ?></div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
