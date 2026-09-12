<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/run';
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
      <span class="is-active"><i class="fa-solid fa-coins"></i></span>
      <span><i class="fa-solid fa-file-invoice"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>Payroll Runs</h4>
        <span class="payroll-mockup-pill">Process → Approve → Lock → Pay</span>
      </div>
      <div class="payroll-table-wrap">
        <table class="payroll-table">
          <thead>
            <tr>
              <th>Run</th>
              <th>Period</th>
              <th>Employees</th>
              <th>Net</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>PR-2026-03</td>
              <td>Mar 2026</td>
              <td>86</td>
              <td>₹16,32,410</td>
              <td><span class="payroll-badge info">Calculated</span></td>
            </tr>
            <tr>
              <td>PR-2026-02</td>
              <td>Feb 2026</td>
              <td>84</td>
              <td>₹15,98,220</td>
              <td><span class="payroll-badge ok">Paid</span></td>
            </tr>
            <tr>
              <td>PR-2026-01</td>
              <td>Jan 2026</td>
              <td>82</td>
              <td>₹15,41,090</td>
              <td><span class="payroll-badge ok">Locked</span></td>
            </tr>
            <tr>
              <td>PR-2025-12</td>
              <td>Dec 2025</td>
              <td>81</td>
              <td>₹15,12,880</td>
              <td><span class="payroll-badge muted">Cancelled</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
