<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> / Statutory Compliance
    </nav>
    <div class="payroll-eyebrow">Statutory Compliance</div>
    <h1>Payroll statutory compliance software for India</h1>
    <p>Help your team manage EPF, ESI, Professional Tax, and TDS payroll components with configurable settings, employee identifiers, calculations, and reports.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="payroll-disclaimer mb-4" role="note">
      <strong>Important:</strong> Maz Payroll helps you manage statutory payroll amounts and reports. It does not guarantee compliance, does not replace professional advice, and does not e-file returns to government portals. Statutory rules can change—verify applicable requirements for your organisation.
    </div>
    <div class="row align-items-center g-4 g-lg-5 mb-5">
      <div class="col-lg-5">
        <h2 class="fw-bold">Built around India payroll statutory needs</h2>
        <p class="text-secondary">Configure organisation-level statutory components, capture employee details where required, include amounts in payroll runs, and review dedicated reports. Pair this with your <a href="<?php echo htmlspecialchars(payroll_url('payroll-management')); ?>">payroll management</a> workflow each month.</p>
      </div>
      <div class="col-lg-7"><?php include __DIR__ . '/includes/mockups/mockup-statutory.php'; ?></div>
    </div>

    <div class="row g-4">
      <div class="col-md-6" id="epf">
        <div class="payroll-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-piggy-bank" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">EPF</h2>
          <p class="text-secondary mb-0">Configure organisation EPF settings (including rates and related options), capture employee UAN/PF details and eligibility, include EPF in payroll calculations, and use the EPF report to review employee and employer contributions.</p>
        </div>
      </div>
      <div class="col-md-6" id="esi">
        <div class="payroll-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-heart-pulse" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">ESI</h2>
          <p class="text-secondary mb-0">Set organisation ESI parameters and wage limits, mark employee ESI applicability, include ESI in payroll where configured, and review the ESI report for covered wages and contributions.</p>
        </div>
      </div>
      <div class="col-md-6" id="pt">
        <div class="payroll-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-landmark" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">Professional Tax</h2>
          <p class="text-secondary mb-0">Enable Professional Tax at organisation level with registration details, deduction cycle, and slabs. Review PT amounts using the Professional Tax report (availability may depend on your plan or add-ons).</p>
        </div>
      </div>
      <div class="col-md-6" id="tds">
        <div class="payroll-feature-card h-100">
          <div class="fi"><i class="fa-solid fa-receipt" aria-hidden="true"></i></div>
          <h2 class="h5 fw-bold">TDS</h2>
          <p class="text-secondary mb-0">Capture employee PAN and use TDS reporting to help review tax-related payroll amounts. TDS report access may depend on your plan or add-ons. Maz Payroll is not a complete income-tax filing product.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="payroll-section bg-soft">
  <div class="container">
    <h2 class="fw-bold mb-3">What Maz Payroll does not claim</h2>
    <ul class="text-secondary mb-0">
      <li>Direct government e-filing to EPFO, ESIC, PT portals, or income-tax systems</li>
      <li>Labour Welfare Fund or statutory bonus processing (marked for future updates in the product)</li>
      <li>Legal guarantees that payroll outputs satisfy every local requirement without review</li>
    </ul>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
