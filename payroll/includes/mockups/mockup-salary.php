<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/employees/salary';
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
      <span class="is-active"><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-layer-group"></i></span>
      <span><i class="fa-solid fa-coins"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>Employee Salary · Meera Nair</h4>
        <span class="payroll-mockup-pill">CTC ₹9,60,000</span>
      </div>
      <div class="payroll-kpi-row">
        <div class="payroll-kpi"><div class="label">Structure</div><div class="value">Std India</div></div>
        <div class="payroll-kpi"><div class="label">Gross / mo</div><div class="value">₹70,000</div></div>
        <div class="payroll-kpi"><div class="label">Deductions</div><div class="value">₹8,420</div></div>
        <div class="payroll-kpi"><div class="label">Employer</div><div class="value">₹9,100</div></div>
      </div>
      <div class="payroll-table-wrap">
        <table class="payroll-table">
          <thead>
            <tr>
              <th>Component</th>
              <th>Type</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Basic</td><td>Earning</td><td>₹35,000</td></tr>
            <tr><td>HRA</td><td>Earning</td><td>₹14,000</td></tr>
            <tr><td>Special Allowance</td><td>Earning</td><td>₹21,000</td></tr>
            <tr><td>EPF Employee</td><td>Deduction</td><td>₹4,200</td></tr>
            <tr><td>EPF Employer</td><td>Contribution</td><td>₹4,200</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
