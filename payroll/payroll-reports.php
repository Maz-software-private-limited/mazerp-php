<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$core_reports = [
  ['Payroll Summary', 'High-level totals and payroll status for a period.'],
  ['Salary Register', 'Employee-wise salary register for the selected month or run.'],
  ['Earnings & Deductions', 'Component-level earnings and deductions with drill-down.'],
  ['Attendance Summary', 'Working days, present days, and related attendance totals.'],
  ['Leave Report', 'Leave usage across employees and periods.'],
  ['Leave Balance', 'Remaining leave balances by type and employee.'],
  ['LOP Report', 'Loss-of-pay days that affect payable salary.'],
  ['Employee Salary', 'Assigned structures and CTC views for employees.'],
  ['Salary Payment', 'Payment-oriented payroll outcomes for the period.'],
  ['EPF Report', 'PF wages and employee/employer contribution details.'],
  ['ESI Report', 'ESI covered wages and contribution details.'],
];

$gated_reports = [
  ['Employee Payroll Detail', 'Deeper employee-level payroll detail (advanced reports).'],
  ['Payroll Cost', 'Employer cost views including contributions (advanced reports).'],
  ['Payroll Run Status', 'Status tracking across payroll runs (advanced reports).'],
  ['Overtime Report', 'Overtime hours and amounts when OT is enabled.'],
  ['Professional Tax Report', 'PT amounts by employee/period when PT reporting is enabled.'],
  ['TDS Report', 'TDS-related payroll amounts when TDS reporting is enabled.'],
];
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(payroll_url('features')); ?>">Features</a> / Payroll Reports
    </nav>
    <div class="payroll-eyebrow">Payroll Reports</div>
    <h1>Payroll reports for HR and finance reviews</h1>
    <p>Use the reports available in Maz Payroll—salary, attendance, leave, statutory, and payment views—without inventing extras that are not in the product.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row align-items-center g-4 mb-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Reports hub</h2>
        <p class="text-secondary">Generate the reports you need after each payroll cycle. Filters typically include month, branch, department, and employee where relevant.</p>
        <a href="<?php echo htmlspecialchars(payroll_url('statutory-compliance')); ?>">Statutory reports context</a>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-reports.php'; ?></div>
    </div>

    <h2 class="h4 fw-bold mb-3">Core reports</h2>
    <div class="row g-3 mb-4">
      <?php foreach ($core_reports as $r): ?>
      <div class="col-md-6 col-lg-4">
        <div class="payroll-feature-card h-100">
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($r[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($r[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <h2 class="h4 fw-bold mb-3">Plan or add-on capable reports</h2>
    <p class="text-secondary small mb-3">These reports exist in the product and may require advanced reporting, overtime, PT, or TDS capabilities depending on your subscription.</p>
    <div class="row g-3">
      <?php foreach ($gated_reports as $r): ?>
      <div class="col-md-6 col-lg-4">
        <div class="payroll-feature-card h-100">
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($r[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($r[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
