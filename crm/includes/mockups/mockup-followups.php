<?php
$url = $mockup_url ?? 'app.mazerp.com/crm/follow-ups';
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
      <span><i class="fa-solid fa-user-plus"></i></span>
      <span class="is-active"><i class="fa-solid fa-bell"></i></span>
      <span><i class="fa-solid fa-list-check"></i></span>
    </aside>
    <div class="crm-mockup-main">
      <div class="crm-mockup-toolbar">
        <h4>Follow-ups</h4>
        <span class="crm-mockup-pill">6 due today</span>
      </div>
      <div class="crm-follow-list">
        <div class="crm-follow-item">
          <div>
            <strong>Call Nova Pharma</strong>
            <span>Assigned to Priya · Due 11:00 AM</span>
          </div>
          <span class="crm-badge hot">Overdue</span>
        </div>
        <div class="crm-follow-item">
          <div>
            <strong>Send quote — Greenfield Homes</strong>
            <span>Assigned to Arun · Due 2:00 PM</span>
          </div>
          <span class="crm-badge warn">Today</span>
        </div>
        <div class="crm-follow-item">
          <div>
            <strong>WhatsApp check-in — Lotus Agencies</strong>
            <span>Assigned to Meena · Due 4:30 PM</span>
          </div>
          <span class="crm-badge new">Today</span>
        </div>
        <div class="crm-follow-item">
          <div>
            <strong>Demo rematch — Orbit Agencies</strong>
            <span>Assigned to Priya · Tomorrow</span>
          </div>
          <span class="crm-badge ok">Scheduled</span>
        </div>
      </div>
    </div>
  </div>
</div>
