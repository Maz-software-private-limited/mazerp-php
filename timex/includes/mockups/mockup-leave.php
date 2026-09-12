<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/leave';
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
      <span class="is-active"><i class="fa-solid fa-umbrella-beach"></i></span>
      <span><i class="fa-solid fa-business-time"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Leave &amp; Approvals</h4>
        <span class="timex-mockup-pill">Pending 4</span>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Type</th>
              <th>Days</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Asha N.</td>
              <td>Casual leave</td>
              <td>1</td>
              <td><span class="timex-badge warn">Manager</span></td>
            </tr>
            <tr>
              <td>Rahul K.</td>
              <td>Overtime</td>
              <td>2.5h</td>
              <td><span class="timex-badge warn">HR</span></td>
            </tr>
            <tr>
              <td>Meera S.</td>
              <td>Regularization</td>
              <td>Missed out</td>
              <td><span class="timex-badge ok">Approved</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
