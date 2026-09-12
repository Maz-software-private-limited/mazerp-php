<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/reports';
?>
<div class="timex-mockup" aria-hidden="true">
  <div class="timex-mockup-chrome">
    <span class="timex-mockup-dot"></span>
    <span class="timex-mockup-dot"></span>
    <span class="timex-mockup-dot"></span>
    <div class="timex-mockup-url"><?php echo htmlspecialchars($url); ?></div>
  </div>
  <div class="timex-mockup-body">
    <aside class="timex-mockup-side">
      <span><i class="fa-solid fa-gauge-high"></i></span>
      <span><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-calendar-check"></i></span>
      <span class="is-active"><i class="fa-solid fa-chart-column"></i></span>
      <span><i class="fa-solid fa-location-dot"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Workforce Reports</h4>
        <span class="timex-mockup-pill">Monthly</span>
      </div>
      <div class="timex-kpi-row">
        <div class="timex-kpi"><div class="label">Present days</div><div class="value">1,842</div></div>
        <div class="timex-kpi"><div class="label">Leave days</div><div class="value">96</div></div>
        <div class="timex-kpi"><div class="label">OT hours</div><div class="value">214</div></div>
        <div class="timex-kpi"><div class="label">Exceptions</div><div class="value">12</div></div>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Report</th>
              <th>Period</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Monthly attendance</td>
              <td>Mar 2026</td>
              <td><span class="timex-badge ok">Ready</span></td>
            </tr>
            <tr>
              <td>Overtime summary</td>
              <td>Mar 2026</td>
              <td><span class="timex-badge ok">Ready</span></td>
            </tr>
            <tr>
              <td>Location exceptions</td>
              <td>This week</td>
              <td><span class="timex-badge warn">Review</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
