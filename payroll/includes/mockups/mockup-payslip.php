<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/salary-payments';
?>
<div class="payroll-mockup" aria-hidden="true">
  <div class="payroll-mockup-chrome">
    <span class="payroll-mockup-dot"></span>
    <span class="payroll-mockup-dot"></span>
    <span class="payroll-mockup-dot"></span>
    <div class="payroll-mockup-url"><?php echo htmlspecialchars($url); ?></div>
  </div>
  <div class="payroll-mockup-body">
    <aside class="payroll-mockup-side">
      <span><i class="fa-solid fa-gauge-high"></i></span>
      <span><i class="fa-solid fa-coins"></i></span>
      <span class="is-active"><i class="fa-solid fa-file-invoice-dollar"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>Payments &amp; Payslips</h4>
        <span class="payroll-mockup-pill">PDF download</span>
      </div>
      <div class="row g-3 align-items-start">
        <div class="col-md-5">
          <div class="payroll-payslip">
            <div class="payroll-payslip-head">
              <div>
                <div class="fw-bold">Maz Payroll</div>
                <div class="small text-secondary">Payslip · Mar 2026</div>
              </div>
              <div class="text-end small">
                <div class="fw-semibold">Meera Nair</div>
                <div class="text-secondary">EMP-014</div>
              </div>
            </div>
            <div class="payroll-line"><span>Basic</span><span>₹35,000</span></div>
            <div class="payroll-line"><span>HRA</span><span>₹14,000</span></div>
            <div class="payroll-line"><span>Special Allowance</span><span>₹21,000</span></div>
            <div class="payroll-line"><span>EPF (Employee)</span><span>−₹4,200</span></div>
            <div class="payroll-line"><span>Professional Tax</span><span>−₹200</span></div>
            <div class="payroll-line total"><span>Net pay</span><span>₹65,600</span></div>
            <div class="small text-secondary mt-2">Employer EPF contribution: ₹4,200</div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="payroll-table-wrap">
            <table class="payroll-table">
              <thead>
                <tr>
                  <th>Employee</th>
                  <th>Net</th>
                  <th>Payslip</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Meera Nair</td>
                  <td>₹65,600</td>
                  <td><span class="payroll-badge ok">Ready</span></td>
                </tr>
                <tr>
                  <td>Arjun Patel</td>
                  <td>₹48,210</td>
                  <td><span class="payroll-badge ok">Ready</span></td>
                </tr>
                <tr>
                  <td>Sana Khan</td>
                  <td>₹39,840</td>
                  <td><span class="payroll-badge info">Generate</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
