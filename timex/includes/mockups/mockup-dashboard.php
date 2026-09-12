<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/dashboard';
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
      <span class="is-active"><i class="fa-solid fa-gauge-high"></i></span>
      <span><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-clock"></i></span>
      <span><i class="fa-solid fa-calendar-check"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Workforce Dashboard</h4>
        <span class="timex-mockup-pill">Today</span>
      </div>
      <div class="timex-kpi-row">
        <div class="timex-kpi"><div class="label">Headcount</div><div class="value">86</div></div>
        <div class="timex-kpi"><div class="label">Present</div><div class="value">72</div></div>
        <div class="timex-kpi"><div class="label">On leave</div><div class="value">5</div></div>
        <div class="timex-kpi"><div class="label">Pending OT</div><div class="value">3</div></div>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Department</th>
              <th>Present</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Operations</td>
              <td>28 / 32</td>
              <td><span class="timex-badge ok">On track</span></td>
            </tr>
            <tr>
              <td>Sales</td>
              <td>14 / 18</td>
              <td><span class="timex-badge warn">2 late</span></td>
            </tr>
            <tr>
              <td>Support</td>
              <td>19 / 20</td>
              <td><span class="timex-badge ok">Healthy</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
