<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/attendance/calendar';
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
      <span class="is-active"><i class="fa-solid fa-calendar-check"></i></span>
      <span><i class="fa-solid fa-qrcode"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Attendance Calendar</h4>
        <span class="timex-mockup-pill">Mar 2026</span>
      </div>
      <div class="timex-kpi-row">
        <div class="timex-kpi"><div class="label">Present</div><div class="value">18</div></div>
        <div class="timex-kpi"><div class="label">Leave</div><div class="value">2</div></div>
        <div class="timex-kpi"><div class="label">Absent</div><div class="value">1</div></div>
        <div class="timex-kpi"><div class="label">Late mins</div><div class="value">42</div></div>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>In / Out</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mon 10</td>
              <td>09:04 / 18:12</td>
              <td><span class="timex-badge ok">Present</span></td>
            </tr>
            <tr>
              <td>Tue 11</td>
              <td>09:31 / 18:05</td>
              <td><span class="timex-badge warn">Late</span></td>
            </tr>
            <tr>
              <td>Wed 12</td>
              <td>—</td>
              <td><span class="timex-badge ok">Leave</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
