<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <div class="crm-eyebrow">About Us</div>
    <h1>Built for growing sales teams</h1>
    <p>Maz CRM is part of MazERP by MAZ Software Solutions — cloud software for Indian businesses that need leads, billing, and operations in sync.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container" style="max-width:860px;">
    <h2 class="fw-bold h3 mb-3">Why we built Maz CRM</h2>
    <p class="text-secondary mb-3">Most small and mid-size sales teams still run on spreadsheets, chat threads, and memory. Follow-ups slip. Ownership is unclear. Handovers lose context.</p>
    <p class="text-secondary mb-4">Maz CRM gives you a shared place for leads, deals, customers, and activities — without enterprise complexity. Because CRM sits on the same platform as billing and inventory, customer data stays consistent when a lead becomes a paying account.</p>

    <div class="row g-3 mb-4">
      <div class="col-md-4"><div class="crm-why-item h-100"><i class="fa-solid fa-bullseye"></i><h3 class="h6 fw-bold">Sales-first design</h3><p class="small text-secondary mb-0">Screens for leads, follow-ups, and pipeline — not generic dashboards.</p></div></div>
      <div class="col-md-4"><div class="crm-why-item h-100"><i class="fa-solid fa-link"></i><h3 class="h6 fw-bold">Connected platform</h3><p class="small text-secondary mb-0">CRM, ERP, and accounting share one customer record when you need them.</p></div></div>
      <div class="col-md-4"><div class="crm-why-item h-100"><i class="fa-solid fa-headset"></i><h3 class="h6 fw-bold">Local support</h3><p class="small text-secondary mb-0">Talk to people who understand Indian retail, wholesale, and field sales.</p></div></div>
    </div>

    <div class="p-4 border rounded-4 bg-light">
      <h3 class="h5 fw-bold">MAZ Software Solutions</h3>
      <p class="text-secondary mb-3">Based in Tirunelveli, Tamil Nadu. <?php echo htmlspecialchars(CONTACT_PHONE); ?> · <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a></p>
      <a href="demo.php" class="btn btn-primary px-4">Book a Demo</a>
      <a href="contact.php" class="btn btn-outline-primary px-4 ms-2">Contact Us</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
