<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> / Features
    </nav>
    <div class="payroll-eyebrow">Features</div>
    <h1>Payroll software features for modern teams</h1>
    <p>From employee setup and salary structures to attendance, payroll runs, statutory components, payslips, and reports—see what Maz Payroll includes.</p>
  </div>
</section>

<section class="payroll-section" id="employees">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Employee Management</h2>
        <p class="text-secondary">Maintain complete payroll-ready employee records in one place.</p>
        <ul class="text-secondary">
          <li>Employee profiles and codes</li>
          <li>Employment details: branch, department, designation, type, joining date</li>
          <li>Bank and IFSC payment information</li>
          <li>PAN and statutory fields for PF/ESI when enabled</li>
          <li>Optional document fields such as Aadhaar, ID card, and offer letter</li>
        </ul>
        <a href="<?php echo htmlspecialchars(payroll_url('employee-management')); ?>">Explore employee management</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-employee.php'; ?></div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft" id="salary">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 order-lg-2"><?php include __DIR__ . '/includes/mockups/mockup-salary.php'; ?></div>
      <div class="col-lg-5 order-lg-1">
        <h2 class="fw-bold">Salary Management</h2>
        <p class="text-secondary">Design how people are paid—and keep CTC aligned with every run.</p>
        <ul class="text-secondary">
          <li>Salary components: earnings, deductions, employer contributions</li>
          <li>Fixed, percentage, or formula-based calculations</li>
          <li>Salary structures as reusable templates</li>
          <li>Employee CTC assignment with revision history</li>
        </ul>
        <a href="<?php echo htmlspecialchars(payroll_url('salary-management')); ?>">Explore salary management</a>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section" id="processing">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Payroll Processing</h2>
        <p class="text-secondary">Run each month with a controlled workflow instead of ad-hoc spreadsheets.</p>
        <ul class="text-secondary">
          <li>Payroll Month overview and input lock</li>
          <li>Create and process payroll runs</li>
          <li>Review employee-level calculations</li>
          <li>Approve, lock, pay, recalculate, or cancel as needed</li>
        </ul>
        <a href="<?php echo htmlspecialchars(payroll_url('payroll-management')); ?>">Explore payroll management</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-run.php'; ?></div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft" id="attendance">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="fw-bold">Attendance &amp; Leave</h2>
        <p class="text-secondary">Connect working days to payable salary with attendance and leave inputs.</p>
        <ul class="text-secondary mb-0">
          <li>Daily attendance statuses including present, absent, half day, leave, holiday, and week-off</li>
          <li>Monthly attendance summaries with LOP and paid days</li>
          <li>Leave types, policies, requests, and balances</li>
          <li>Optional overtime tracking when enabled for your organisation</li>
        </ul>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold" id="statutory">Statutory Payroll</h2>
        <p class="text-secondary">Configure and report on India-focused statutory payroll components.</p>
        <ul class="text-secondary mb-3">
          <li>EPF organisation settings and employee PF/UAN details</li>
          <li>ESI settings and employee ESI applicability</li>
          <li>Professional Tax organisation setup and reporting</li>
          <li>TDS reporting with employee PAN capture</li>
        </ul>
        <a href="<?php echo htmlspecialchars(payroll_url('statutory-compliance')); ?>">Read about statutory compliance</a>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section" id="payslips">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold">Payslips</h2>
        <p class="text-secondary">After a run is locked and paid, generate payslips that break down earnings, deductions, and employer contributions—and download them as PDF from the admin portal.</p>
        <a href="<?php echo htmlspecialchars(payroll_url('payslips')); ?>">Explore payslips</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-payslip.php'; ?></div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft" id="reports">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 order-lg-2"><?php include __DIR__ . '/includes/mockups/mockup-reports.php'; ?></div>
      <div class="col-lg-5 order-lg-1">
        <h2 class="fw-bold">Reports</h2>
        <p class="text-secondary">Use the reports hub for payroll summary, salary register, earnings &amp; deductions, attendance, leave, LOP, EPF, ESI, payment status, and more. Some advanced or statutory reports may depend on your plan or add-ons.</p>
        <a href="<?php echo htmlspecialchars(payroll_url('payroll-reports')); ?>">View payroll reports</a>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section" id="settings">
  <div class="container">
    <div class="text-center mb-4">
      <div class="payroll-eyebrow">Settings</div>
      <h2 class="fw-bold">Configure payroll once, run it every month</h2>
    </div>
    <div class="row g-3">
      <?php
      $settings = [
        ['Pay Schedule', 'Work week, salary calculation basis, and pay-date rules.'],
        ['Statutory Components', 'Organisation EPF, ESI, and Professional Tax setup.'],
        ['Salary Setup', 'Components and structures that drive CTC and monthly lines.'],
        ['Organisation', 'Companies, branches, departments, designations, shifts, users, and roles.'],
        ['Leave & Attendance', 'Policies and how missing attendance is treated.'],
      ];
      foreach ($settings as $s):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="payroll-feature-card h-100">
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($s[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($s[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
