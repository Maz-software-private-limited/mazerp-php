</main>

<section class="crm-cta-band">
  <div class="container text-center">
    <h2 class="h3 fw-bold mb-2">Ready to simplify your sales process?</h2>
    <p class="mb-4 text-white-50 mx-auto" style="max-width:32rem;">Capture leads, run follow-ups, move the pipeline, and keep customer history in one modern workspace.</p>
    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="<?php echo htmlspecialchars(CRM_SIGNUP_URL); ?>" class="btn btn-light btn-lg px-4 fw-semibold">Start Free</a>
      <a href="<?php echo htmlspecialchars(crm_url('contact')); ?>" class="btn btn-outline-light btn-lg px-4">Book a Demo</a>
    </div>
  </div>
</section>

<footer class="crm-footer">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="d-flex align-items-center gap-2 mb-3">
          <img src="<?php echo htmlspecialchars(CRM_LOGO_URL); ?>" alt="" height="32" width="86" class="crm-brand-logo">
          <span class="text-white fw-semibold">Maz CRM</span>
        </div>
        <p class="small text-white-50 mb-3" style="max-width:22rem;">Cloud CRM software for growing Indian businesses—leads, pipeline, follow-ups, customers, and reports.</p>
        <a href="<?php echo htmlspecialchars(CRM_MAIN_SITE_URL); ?>/" class="small link-light text-decoration-underline">Part of the MazERP suite</a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Product</p>
        <ul class="list-unstyled crm-footer-links">
          <?php foreach ($crm_footer_product as $item): ?>
            <li><a href="<?php echo htmlspecialchars($item['url']); ?>"><?php echo htmlspecialchars($item['label']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Company</p>
        <ul class="list-unstyled crm-footer-links">
          <li><a href="<?php echo htmlspecialchars(crm_url('pricing')); ?>">Pricing</a></li>
          <li><a href="<?php echo htmlspecialchars(crm_url('faq')); ?>">FAQ</a></li>
          <li><a href="<?php echo htmlspecialchars(crm_url('contact')); ?>">Contact</a></li>
          <li><a href="<?php echo htmlspecialchars(CRM_SIGNUP_URL); ?>">Start Free</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Legal</p>
        <ul class="list-unstyled crm-footer-links">
          <li><a href="<?php echo htmlspecialchars(CRM_MAIN_SITE_URL); ?>/privacy-policy.php">Privacy Policy</a></li>
          <li><a href="<?php echo htmlspecialchars(CRM_MAIN_SITE_URL); ?>/terms-of-service.php">Terms of Service</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Contact</p>
        <ul class="list-unstyled crm-footer-links">
          <li><a href="tel:+918110087700"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a></li>
          <li><a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a></li>
          <li><a href="https://wa.me/<?php echo htmlspecialchars(WHATSAPP_NUMBER); ?>" target="_blank" rel="noopener">WhatsApp</a></li>
        </ul>
      </div>
    </div>

    <hr class="border-secondary opacity-25 my-4">

    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 small text-white-50">
      <p class="mb-0">&copy; <?php echo date('Y'); ?> Maz CRM. All rights reserved.</p>
      <p class="mb-0">Built for Indian sales teams — leads, pipeline, follow-ups, and reports.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo htmlspecialchars(CRM_LOCAL_ASSET_BASE); ?>/js/crm-site.js?v=3.0" defer></script>
</body>
</html>
