<?php
$url = $mockup_url ?? 'app.mazerp.com/crm/contacts';
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
      <span class="is-active"><i class="fa-solid fa-address-book"></i></span>
      <span><i class="fa-solid fa-phone"></i></span>
    </aside>
    <div class="crm-mockup-main">
      <div class="crm-mockup-toolbar">
        <h4>Customer Profile</h4>
        <span class="crm-mockup-pill">Outstanding ₹24,500</span>
      </div>
      <div class="crm-contact-layout">
        <div class="crm-contact-card">
          <div class="crm-avatar">RK</div>
          <strong>Ramesh Kumar</strong>
          <p style="margin:6px 0 0;font-size:0.8rem;color:var(--crm-muted);">Metro Distributors<br>+91 98XXX XXX21</p>
          <p style="margin:12px 0 0;font-size:0.78rem;"><span class="crm-badge ok">Active</span></p>
        </div>
        <div class="crm-timeline">
          <div class="crm-timeline-item">
            <i class="fa-solid fa-phone"></i>
            <div><strong>Call logged</strong><br><span style="color:var(--crm-muted);">Discussed credit terms · Today 10:24</span></div>
          </div>
          <div class="crm-timeline-item">
            <i class="fa-solid fa-file-invoice"></i>
            <div><strong>Invoice #INV-2041</strong><br><span style="color:var(--crm-muted);">₹78,400 · Yesterday</span></div>
          </div>
          <div class="crm-timeline-item">
            <i class="fa-solid fa-comment"></i>
            <div><strong>WhatsApp follow-up</strong><br><span style="color:var(--crm-muted);">Quote shared · 2 days ago</span></div>
          </div>
          <div class="crm-timeline-item">
            <i class="fa-solid fa-star"></i>
            <div><strong>Converted from lead</strong><br><span style="color:var(--crm-muted);">Source: Referral · 12 days ago</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
