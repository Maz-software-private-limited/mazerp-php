<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/live';
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
      <span class="is-active"><i class="fa-solid fa-tower-broadcast"></i></span>
      <span><i class="fa-solid fa-qrcode"></i></span>
      <span><i class="fa-solid fa-location-dot"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Live Attendance</h4>
        <span class="timex-mockup-pill">Live</span>
      </div>
      <div class="timex-kpi-row">
        <div class="timex-kpi"><div class="label">Checked in</div><div class="value">64</div></div>
        <div class="timex-kpi"><div class="label">Late</div><div class="value">7</div></div>
        <div class="timex-kpi"><div class="label">Open</div><div class="value">4</div></div>
        <div class="timex-kpi"><div class="label">Absent</div><div class="value">11</div></div>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Check-in</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Asha N.</td>
              <td>09:02</td>
              <td><span class="timex-badge ok">Present</span></td>
            </tr>
            <tr>
              <td>Rahul K.</td>
              <td>09:28</td>
              <td><span class="timex-badge warn">Late</span></td>
            </tr>
            <tr>
              <td>Meera S.</td>
              <td>—</td>
              <td><span class="timex-badge warn">Open</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
