<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(payroll_url('features')); ?>">Features</a> / Salary Management
    </nav>
    <div class="payroll-eyebrow">Salary Management</div>
    <h1>Salary management software for structured CTC</h1>
    <p>Define earnings, deductions, and employer contributions once—then reuse salary structures across employees with clear monthly and annual CTC.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Salary templates that match how you pay</h2>
        <p class="text-secondary">Salary structures act as templates. Bundle components into a structure, assign it to employees, and set CTC so payroll lines stay consistent every month.</p>
        <ul class="text-secondary">
          <li><strong>Earnings</strong> such as basic, HRA, and allowances</li>
          <li><strong>Deductions</strong> including employee statutory and other withholdings you configure</li>
          <li><strong>Employer contributions</strong> tracked as contribution components</li>
          <li>Calculation methods: fixed amount, percentage, or formula</li>
          <li>Flags for gross, net, CTC, taxable, and proratable behaviour where configured</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-salary.php'; ?></div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">CTC assignment</h2>
          <p class="small text-secondary mb-0">Assign monthly or annual CTC on the employee salary screen, revise packages over time, and review component lines before the next payroll run.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Realistic example</h2>
          <p class="small text-secondary mb-0">A standard India structure might split CTC into basic, HRA, and special allowance earnings, with employee EPF as a deduction and employer EPF as a contribution—exact components depend on your setup.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Connected to payroll runs</h2>
          <p class="small text-secondary mb-0">Configured salary feeds <a href="<?php echo htmlspecialchars(payroll_url('payroll-management')); ?>">payroll processing</a>, payslip breakdowns, and salary reports—so finance reviews the same numbers across the month.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
