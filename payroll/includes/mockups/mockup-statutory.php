<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/reports/epf';
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
      <span class="is-active"><i class="fa-solid fa-chart-column"></i></span>
      <span><i class="fa-solid fa-gear"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>EPF Report</h4>
        <span class="payroll-mockup-pill">Mar 2026</span>
      </div>
      <div class="payroll-kpi-row">
        <div class="payroll-kpi"><div class="label">Employee PF</div><div class="value">₹62,400</div></div>
        <div class="payroll-kpi"><div class="label">Employer PF</div><div class="value">₹62,400</div></div>
        <div class="payroll-kpi"><div class="label">EPS</div><div class="value">₹28,100</div></div>
        <div class="payroll-kpi"><div class="label">Covered</div><div class="value">74</div></div>
      </div>
      <div class="payroll-table-wrap">
        <table class="payroll-table">
          <thead>
            <tr>
              <th>Employee</th>
              <th>UAN</th>
              <th>Wage</th>
              <th>EE</th>
              <th>ER</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Meera Nair</td>
              <td>1002••••••91</td>
              <td>₹35,000</td>
              <td>₹4,200</td>
              <td>₹4,200</td>
            </tr>
            <tr>
              <td>Arjun Patel</td>
              <td>1008••••••44</td>
              <td>₹28,000</td>
              <td>₹3,360</td>
              <td>₹3,360</td>
            </tr>
            <tr>
              <td>Sana Khan</td>
              <td>1011••••••18</td>
              <td>₹22,500</td>
              <td>₹2,700</td>
              <td>₹2,700</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
