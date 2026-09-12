<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/reports';
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
      <span><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-coins"></i></span>
      <span class="is-active"><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>Reports Hub</h4>
        <span class="payroll-mockup-pill">Salary · Attendance · Statutory</span>
      </div>
      <div class="row g-2">
        <?php
        $cards = [
          ['Payroll Summary', 'Month totals & status'],
          ['Salary Register', 'Employee-wise payout'],
          ['Earnings & Deductions', 'Component breakdown'],
          ['Attendance Summary', 'Present / LOP days'],
          ['EPF Report', 'PF wages & contributions'],
          ['ESI Report', 'ESI covered wages'],
        ];
        foreach ($cards as $c):
        ?>
        <div class="col-6 col-md-4">
          <div class="payroll-kpi h-100">
            <div class="value" style="font-size:0.8rem;"><?php echo htmlspecialchars($c[0]); ?></div>
            <div class="label mb-0"><?php echo htmlspecialchars($c[1]); ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
