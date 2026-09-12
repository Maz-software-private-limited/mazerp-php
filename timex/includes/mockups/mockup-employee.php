<?php
$url = $mockup_url ?? 'app.mazerp.com/timex/employees';
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
      <span class="is-active"><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-clock"></i></span>
      <span><i class="fa-solid fa-calendar-check"></i></span>
      <span><i class="fa-solid fa-chart-column"></i></span>
    </aside>
    <div class="timex-mockup-main">
      <div class="timex-mockup-toolbar">
        <h4>Employees</h4>
        <span class="timex-mockup-pill">Active</span>
      </div>
      <div class="timex-table-wrap">
        <table class="timex-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Dept</th>
              <th>Shift</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Asha Nair</td>
              <td>Ops</td>
              <td>General</td>
              <td><span class="timex-badge ok">Active</span></td>
            </tr>
            <tr>
              <td>Rahul Kapoor</td>
              <td>Sales</td>
              <td>Field</td>
              <td><span class="timex-badge ok">Active</span></td>
            </tr>
            <tr>
              <td>Meera Shah</td>
              <td>Support</td>
              <td>General</td>
              <td><span class="timex-badge ok">Active</span></td>
            </tr>
            <tr>
              <td>Vikram Rao</td>
              <td>Ops</td>
              <td>Night</td>
              <td><span class="timex-badge warn">Inactive</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
