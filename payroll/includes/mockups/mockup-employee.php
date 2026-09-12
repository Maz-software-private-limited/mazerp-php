<?php
$url = $mockup_url ?? 'app.mazerp.com/payroll/employees';
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
      <span class="is-active"><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-calendar-check"></i></span>
      <span><i class="fa-solid fa-coins"></i></span>
    </aside>
    <div class="payroll-mockup-main">
      <div class="payroll-mockup-toolbar">
        <h4>Employees</h4>
        <span class="payroll-mockup-pill">Bank · PAN · PF · ESI</span>
      </div>
      <div class="payroll-table-wrap">
        <table class="payroll-table">
          <thead>
            <tr>
              <th>Code</th>
              <th>Employee</th>
              <th>Department</th>
              <th>Type</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>EMP-014</td>
              <td>Meera Nair</td>
              <td>Finance</td>
              <td>Permanent</td>
              <td><span class="payroll-badge ok">Active</span></td>
            </tr>
            <tr>
              <td>EMP-028</td>
              <td>Arjun Patel</td>
              <td>Operations</td>
              <td>Permanent</td>
              <td><span class="payroll-badge ok">Active</span></td>
            </tr>
            <tr>
              <td>EMP-041</td>
              <td>Sana Khan</td>
              <td>Sales</td>
              <td>Contract</td>
              <td><span class="payroll-badge ok">Active</span></td>
            </tr>
            <tr>
              <td>EMP-053</td>
              <td>Vikram Iyer</td>
              <td>Engineering</td>
              <td>Intern</td>
              <td><span class="payroll-badge info">Onboard</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
