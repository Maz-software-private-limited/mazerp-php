<?php
http_response_code(404);
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container text-center">
    <div class="crm-eyebrow">404</div>
    <h1>Page not found</h1>
    <p class="mx-auto">The CRM page you requested is unavailable or the URL may have changed.</p>
    <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>" class="btn btn-primary">Go to homepage</a>
      <a href="<?php echo htmlspecialchars(crm_url('features')); ?>" class="btn btn-outline-primary">View features</a>
      <a href="<?php echo htmlspecialchars(crm_url('contact')); ?>" class="btn btn-outline-primary">Contact us</a>
    </div>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row g-3 justify-content-center">
      <?php
      $links = [
        ['Sales Pipeline', crm_url('sales-pipeline')],
        ['Pricing', crm_url('pricing')],
        ['FAQ', crm_url('faq')],
        ['Follow-ups', crm_url('follow-ups')],
      ];
      foreach ($links as $l):
      ?>
      <div class="col-6 col-md-3">
        <a class="crm-feature-card d-block text-center h-100" href="<?php echo htmlspecialchars($l[1]); ?>">
          <h2 class="h6 fw-bold mb-0"><?php echo htmlspecialchars($l[0]); ?></h2>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
