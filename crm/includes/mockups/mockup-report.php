<?php
$url = $mockup_url ?? 'app.mazerp.com/crm/reports';
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
      <span><i class="fa-solid fa-briefcase"></i></span>
      <span class="is-active"><i class="fa-solid fa-chart-column"></i></span>
      <span><i class="fa-solid fa-gear"></i></span>
    </aside>
    <div class="crm-mockup-main">
      <div class="crm-mockup-toolbar">
        <h4>Team Performance</h4>
        <span class="crm-mockup-pill">This month</span>
      </div>
      <div class="crm-kpi-row">
        <div class="crm-kpi"><strong>214</strong><span>New leads</span></div>
        <div class="crm-kpi"><strong>38%</strong><span>Conversion</span></div>
        <div class="crm-kpi"><strong>₹42L</strong><span>Pipeline</span></div>
        <div class="crm-kpi"><strong>91%</strong><span>Follow-ups done</span></div>
      </div>
      <div class="crm-bars" aria-hidden="true">
        <i style="height:45%"></i>
        <i style="height:70%"></i>
        <i style="height:55%"></i>
        <i style="height:88%"></i>
        <i style="height:62%"></i>
        <i style="height:76%"></i>
        <i style="height:92%"></i>
      </div>
    </div>
  </div>
</div>
