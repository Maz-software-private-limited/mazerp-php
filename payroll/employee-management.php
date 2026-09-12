<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> /
      <a href="<?php echo htmlspecialchars(payroll_url('features')); ?>">Features</a> / Employee Management
    </nav>
    <div class="payroll-eyebrow">Employee Management</div>
    <h1>Employee payroll management software</h1>
    <p>Keep the people data payroll depends on—profiles, salary assignment, bank details, and statutory identifiers—organised and ready for every monthly run.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Employee profiles built for payroll</h2>
        <p class="text-secondary">Maz Payroll employee records go beyond a contact list. Capture what finance and HR need to calculate and pay salary accurately.</p>
        <ul class="text-secondary">
          <li>Basic information: code, name, gender, date of birth, contact, and address</li>
          <li>Employment details: work mode, branch, department, designation, employment type, manager, joining date, status, and shift</li>
          <li>Bank details: bank name, account number, and IFSC</li>
          <li>Tax identity: PAN</li>
          <li>Statutory details when enabled: UAN, PF number, EPF/ESI applicability, ESI number</li>
          <li>Document fields on the employee record: Aadhaar, ID card, and offer letter</li>
          <li>Emergency contact information</li>
        </ul>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-employee.php'; ?></div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Salary information</h2>
          <p class="text-secondary mb-0">Assign a salary structure and CTC from Employee Salary, review component lines, and keep revision history when packages change. Learn more on <a href="<?php echo htmlspecialchars(payroll_url('salary-management')); ?>">salary management</a>.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Organisation structure</h2>
          <p class="text-secondary mb-0">Manage departments and designations in Settings, then use them while creating or editing employees for consistent payroll grouping and reporting.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">Statutory settings per employee</h2>
          <p class="text-secondary mb-0">When your organisation enables EPF or ESI, capture applicability and identifiers on the employee so calculations and reports stay aligned. See <a href="<?php echo htmlspecialchars(payroll_url('statutory-compliance')); ?>">statutory compliance</a>.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="payroll-feature-card h-100">
          <h2 class="h5 fw-bold">What to expect</h2>
          <p class="text-secondary mb-0">Documents are stored as fields on the employee record—not a separate document vault. Payroll history is available through runs, payments, and reports rather than a standalone employee timeline.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
