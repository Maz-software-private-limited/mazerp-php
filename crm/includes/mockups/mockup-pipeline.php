<?php
/** CRM pipeline kanban mockup */
$url = $mockup_url ?? 'app.mazerp.com/crm/deals/pipeline';
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
      <span class="is-active"><i class="fa-solid fa-filter"></i></span>
      <span><i class="fa-solid fa-user"></i></span>
      <span><i class="fa-solid fa-briefcase"></i></span>
      <span><i class="fa-solid fa-chart-line"></i></span>
    </aside>
    <div class="crm-mockup-main">
      <div class="crm-mockup-toolbar">
        <h4>Sales Pipeline</h4>
        <span class="crm-mockup-pill">₹18.4L open</span>
      </div>
      <div class="crm-kanban">
        <div class="crm-kanban-col">
          <h5>New <span>4</span></h5>
          <div class="crm-kanban-card"><strong>Sunrise Traders</strong><span>WhatsApp · ₹45,000</span></div>
          <div class="crm-kanban-card"><strong>Nova Pharma</strong><span>Website · ₹72,000</span></div>
        </div>
        <div class="crm-kanban-col">
          <h5>Contacted <span>3</span></h5>
          <div class="crm-kanban-card"><strong>Blue Peak Retail</strong><span>Call · ₹1.2L</span></div>
          <div class="crm-kanban-card"><strong>Orbit Agencies</strong><span>Email · ₹68,000</span></div>
        </div>
        <div class="crm-kanban-col">
          <h5>Qualified <span>2</span></h5>
          <div class="crm-kanban-card"><strong>Metro Distributors</strong><span>Quote sent · ₹2.4L</span></div>
          <div class="crm-kanban-card"><strong>Greenfield Homes</strong><span>Demo done · ₹95,000</span></div>
        </div>
        <div class="crm-kanban-col">
          <h5>Won <span>2</span></h5>
          <div class="crm-kanban-card"><strong>City Hardware</strong><span>Closed · ₹1.8L</span></div>
          <div class="crm-kanban-card"><strong>Pearl Fashion</strong><span>Closed · ₹54,000</span></div>
        </div>
      </div>
    </div>
  </div>
</div>
