<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="timex-page-hero">
  <div class="container">
    <nav class="timex-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(timex_url('index')); ?>">Home</a> / FAQ
    </nav>
    <div class="timex-eyebrow">FAQ</div>
    <h1>Timex frequently asked questions</h1>
    <p>Practical answers about Maz Timex—attendance punch, shifts, leave, overtime, reports, and how Timex works with Maz Payroll.</p>
  </div>
</section>

<section class="timex-section">
  <div class="container" style="max-width:48rem;">
    <div class="accordion timex-faq" id="timexFaq">
      <?php foreach ($timex_faq_items as $i => $faq): ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="fh<?php echo $i; ?>">
          <button class="accordion-button <?php echo $i ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#fc<?php echo $i; ?>" aria-expanded="<?php echo $i ? 'false' : 'true'; ?>" aria-controls="fc<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq['q']); ?>
          </button>
        </h2>
        <div id="fc<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i ? '' : 'show'; ?>" data-bs-parent="#timexFaq">
          <div class="accordion-body text-secondary">
            <?php echo htmlspecialchars($faq['a']); ?>
            <?php if ($i === 1): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(timex_url('attendance-management')); ?>">See live attendance</a></div>
            <?php elseif ($i === 3): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(timex_url('shift-management')); ?>">Explore shifts &amp; locations</a></div>
            <?php elseif ($i === 4 || $i === 5 || $i === 6): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(timex_url('leave-management')); ?>">Explore leave &amp; OT</a></div>
            <?php elseif ($i === 7): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(TIMEX_PAYROLL_URL); ?>">Visit Maz Payroll</a></div>
            <?php elseif ($i === 10): ?>
              <div class="mt-2"><a href="<?php echo htmlspecialchars(timex_url('workforce-reports')); ?>">Explore workforce reports</a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="text-center mt-4 mb-0">
      Still have questions? <a href="<?php echo htmlspecialchars(timex_url('contact')); ?>">Book a demo</a> or <a href="<?php echo htmlspecialchars(timex_url('features')); ?>">browse features</a>.
    </p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
