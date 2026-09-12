<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/shifts';
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
      <span class="is-active"><i class="fa-solid fa-clock"></i></span>
      <span><i class="fa-solid fa-location-dot"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Shifts</h4>
        <span class="timex-mockup-pill">3 shifts</span>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Shift</th>
              <th>Hours</th>
              <th>Weekly off</th>
              <th>OT</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>General</td>
              <td>09:00 – 18:00</td>
              <td>Sun</td>
              <td><span class="timex-badge ok">Eligible</span></td>
            </tr>
            <tr>
              <td>Field</td>
              <td>10:00 – 19:00</td>
              <td>Sun</td>
              <td><span class="timex-badge ok">Eligible</span></td>
            </tr>
            <tr>
              <td>Night</td>
              <td>21:00 – 06:00</td>
              <td>Mon</td>
              <td><span class="timex-badge warn">Cap 4h</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
