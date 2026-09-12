<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/dashboard';
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
      <span class="is-active"><i class="fa-solid fa-gauge-high"></i></span>
      <span><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-calendar-check"></i></span>
      <span><i class="fa-solid fa-coins"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>Payroll Dashboard</h4>
        <span class="payroll-mockup-pill">Mar 2026</span>
      </div>
      <div class="payroll-kpi-row">
        <div class="payroll-kpi"><div class="label">Gross pay</div><div class="value">₹18.4L</div></div>
        <div class="payroll-kpi"><div class="label">Deductions</div><div class="value">₹2.1L</div></div>
        <div class="payroll-kpi"><div class="label">Net pay</div><div class="value">₹16.3L</div></div>
        <div class="payroll-kpi"><div class="label">Employees</div><div class="value">86</div></div>
      </div>
      <div class="payroll-table-wrap">
        <table class="payroll-table">
          <thead>
            <tr>
              <th>Statutory</th>
              <th>Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>EPF</td>
              <td>₹1,24,800</td>
              <td><span class="payroll-badge warn">Pending</span></td>
            </tr>
            <tr>
              <td>ESI</td>
              <td>₹18,450</td>
              <td><span class="payroll-badge warn">Pending</span></td>
            </tr>
            <tr>
              <td>Professional Tax</td>
              <td>₹12,200</td>
              <td><span class="payroll-badge ok">Reviewed</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
