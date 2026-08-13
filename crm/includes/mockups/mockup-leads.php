<?php
$url = $mockup_url ?? 'app.mazerp.com/crm/leads';
?>
<div class="crm-mockup" aria-hidden="true">
  <div class="crm-mockup-chrome">
    <span class="crm-mockup-dot"></span>
    <span class="crm-mockup-dot"></span>
    <span class="crm-mockup-dot"></span>
    <div class="crm-mockup-url"><?php echo htmlspecialchars($url); ?></div>
  </div>
  <div class="crm-mockup-body">
    <aside class="crm-mockup-side">
      <span><i class="fa-solid fa-gauge"></i></span>
      <span class="is-active"><i class="fa-solid fa-user-plus"></i></span>
      <span><i class="fa-solid fa-users"></i></span>
      <span><i class="fa-solid fa-list-check"></i></span>
    </aside>
    <div class="crm-mockup-main">
      <div class="crm-mockup-toolbar">
        <h4>Leads</h4>
        <span class="crm-mockup-pill">128 active</span>
      </div>
      <table class="crm-table">
        <thead>
          <tr>
            <th>Lead</th>
            <th>Source</th>
            <th>Owner</th>
            <th>Status</th>
            <th>Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ananya Krishnan</td>
            <td>Website</td>
            <td>Priya</td>
            <td><span class="crm-badge new">New</span></td>
            <td>₹45,000</td>
          </tr>
          <tr>
            <td>Ravi Traders</td>
            <td>Walk-in</td>
            <td>Arun</td>
            <td><span class="crm-badge hot">Hot</span></td>
            <td>₹1,20,000</td>
          </tr>
          <tr>
            <td>Suresh &amp; Co.</td>
            <td>Referral</td>
            <td>Meena</td>
            <td><span class="crm-badge ok">Qualified</span></td>
            <td>₹78,000</td>
          </tr>
          <tr>
            <td>Lotus Agencies</td>
            <td>WhatsApp</td>
            <td>Priya</td>
            <td><span class="crm-badge warn">Follow-up</span></td>
            <td>₹32,000</td>
          </tr>
          <tr>
            <td>Delta Soft</td>
            <td>Campaign</td>
            <td>Arun</td>
            <td><span class="crm-badge new">New</span></td>
            <td>₹96,000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
