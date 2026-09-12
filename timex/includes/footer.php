</main>

<section class="timex-cta-band">
  <div class="container text-center">
    <h2 class="h3 fw-bold mb-2">Run salary in Payroll from Timex attendance</h2>
    <p class="mb-4 text-white-50 mx-auto" style="max-width:34rem;">Timex owns time. Payroll owns pay. Capture punch, leave, and OT here—then process salary in Maz Payroll with payroll-ready attendance.</p>
    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="<?php echo htmlspecialchars(TIMEX_SIGNUP_URL); ?>" class="btn btn-light btn-lg px-4 fw-semibold">Start Free</a>
      <a href="<?php echo htmlspecialchars(timex_url('contact')); ?>" class="btn btn-outline-light btn-lg px-4">Book a Demo</a>
    </div>
  </div>
</section>

<footer class="timex-footer">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="d-flex align-items-center gap-2 mb-3">
          <img src="<?php echo htmlspecialchars(TIMEX_LOGO_URL); ?>" alt="" height="32" width="86" class="timex-brand-logo">
          <span class="text-white fw-semibold">Maz Timex</span>
        </div>
        <p class="small text-white-50 mb-3" style="max-width:22rem;">Cloud workforce software for growing Indian businesses—employees, shifts, live attendance, leave, overtime, and reports.</p>
        <a href="<?php echo htmlspecialchars(TIMEX_MAIN_SITE_URL); ?>/" class="small link-light text-decoration-underline">Part of the MazERP suite</a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Product</p>
        <ul class="list-unstyled timex-footer-links">
          <?php foreach ($timex_footer_product as $item): ?>
            <li><a href="<?php echo htmlspecialchars($item['url']); ?>"><?php echo htmlspecialchars($item['label']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Company</p>
        <ul class="list-unstyled timex-footer-links">
          <li><a href="<?php echo htmlspecialchars(timex_url('pricing')); ?>">Pricing</a></li>
          <li><a href="<?php echo htmlspecialchars(timex_url('faq')); ?>">FAQ</a></li>
          <li><a href="<?php echo htmlspecialchars(timex_url('contact')); ?>">Contact</a></li>
          <li><a href="<?php echo htmlspecialchars(TIMEX_SIGNUP_URL); ?>">Start Free</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Legal</p>
        <ul class="list-unstyled timex-footer-links">
          <li><a href="<?php echo htmlspecialchars(TIMEX_MAIN_SITE_URL); ?>/privacy-policy.php">Privacy Policy</a></li>
          <li><a href="<?php echo htmlspecialchars(TIMEX_MAIN_SITE_URL); ?>/terms-of-service.php">Terms of Service</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <p class="h6 text-uppercase fw-bold small mb-3 text-white-50">Contact</p>
        <ul class="list-unstyled timex-footer-links">
          <li><a href="tel:+918110087700"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a></li>
          <li><a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a></li>
          <li><a href="https://wa.me/<?php echo htmlspecialchars(WHATSAPP_NUMBER); ?>" target="_blank" rel="noopener">WhatsApp</a></li>
        </ul>
      </div>
    </div>

    <hr class="border-secondary opacity-25 my-4">

    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 small text-white-50">
      <p class="mb-0">&copy; <?php echo date('Y'); ?> Maz Timex. All rights reserved.</p>
      <p class="mb-0">Timex owns time. Payroll owns pay.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo htmlspecialchars(TIMEX_LOCAL_ASSET_BASE); ?>/js/timex-site.js?v=1.0" defer></script>
</body>
</html>
