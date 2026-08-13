<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <div class="crm-eyebrow">Contact</div>
    <h1>Talk to the Maz CRM team</h1>
    <p>Questions about leads, pipeline, pricing, or onboarding? We typically respond within one business hour.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <h2 class="fw-bold h4 mb-3">We are here to help</h2>
        <p class="text-secondary">Prefer a product walkthrough? <a href="demo.php">Book a demo</a> instead.</p>
        <div class="d-flex gap-3 mb-3">
          <div class="crm-plan-icon blue"><i class="fa-solid fa-phone"></i></div>
          <div>
            <div class="fw-semibold">Call Us</div>
            <a href="tel:+918110087700"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a>
          </div>
        </div>
        <div class="d-flex gap-3 mb-3">
          <div class="crm-plan-icon blue"><i class="fa-solid fa-envelope"></i></div>
          <div>
            <div class="fw-semibold">Email Us</div>
            <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a>
          </div>
        </div>
        <div class="d-flex gap-3">
          <div class="crm-plan-icon green"><i class="fa-brands fa-whatsapp"></i></div>
          <div>
            <div class="fw-semibold">WhatsApp</div>
            <a href="https://wa.me/<?php echo htmlspecialchars(WHATSAPP_NUMBER); ?>" target="_blank" rel="noopener">Chat with us</a>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="crm-form-card">
          <h2 class="h4 fw-bold mb-1">Send a message</h2>
          <p class="text-secondary small mb-3">Tell us how we can help. No spam — ever.</p>
          <div id="formMsg" class="form-msg" role="status" aria-live="polite"></div>
          <form id="crmContactForm" action="../api/submit.php" method="post" novalidate>
            <input type="hidden" name="source" value="crm-microsite">
            <input type="hidden" name="intent" value="contact">
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" class="d-none" aria-hidden="true">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="f-name">Full Name *</label>
                <input type="text" class="form-control" id="f-name" name="name" required>
                <div class="form-error" id="err-name"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-email">Work Email *</label>
                <input type="email" class="form-control" id="f-email" name="email" required>
                <div class="form-error" id="err-email"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-phone">Phone *</label>
                <input type="tel" class="form-control" id="f-phone" name="phone" required>
                <div class="form-error" id="err-phone"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-company">Company *</label>
                <input type="text" class="form-control" id="f-company" name="company" required>
                <div class="form-error" id="err-company"></div>
              </div>
              <div class="col-12">
                <label class="form-label" for="f-business">Business Type *</label>
                <select class="form-select" id="f-business" name="business_type" required>
                  <option value="">Select your business type</option>
                  <option value="retail">Retail Store</option>
                  <option value="restaurant">Restaurant</option>
                  <option value="supermarket">Supermarket</option>
                  <option value="pharmacy">Pharmacy</option>
                  <option value="hardware">Hardware Shop</option>
                  <option value="other">Other</option>
                </select>
                <div class="form-error" id="err-business"></div>
              </div>
              <div class="col-12">
                <label class="form-label" for="f-message">Message</label>
                <textarea class="form-control" id="f-message" name="message" rows="4"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100" id="submitBtn">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function () {
  var form = document.getElementById('crmContactForm');
  var msg = document.getElementById('formMsg');
  var btn = document.getElementById('submitBtn');
  var btnLabel = btn ? btn.innerHTML : '';
  if (!form || !btn) return;
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    form.querySelectorAll('.form-error').forEach(function (el) { el.textContent = ''; });
    msg.textContent = '';
    msg.className = 'form-msg';
    var valid = true;
    [
      { id: 'f-name', err: 'err-name', msg: 'Please enter your full name.' },
      { id: 'f-email', err: 'err-email', msg: 'Please enter a valid email address.' },
      { id: 'f-phone', err: 'err-phone', msg: 'Please enter your phone number.' },
      { id: 'f-company', err: 'err-company', msg: 'Please enter your business name.' },
      { id: 'f-business', err: 'err-business', msg: 'Please select your business type.' }
    ].forEach(function (f) {
      var el = document.getElementById(f.id);
      if (!el.value.trim()) {
        document.getElementById(f.err).textContent = f.msg;
        valid = false;
      }
    });
    if (!valid) return;
    btn.disabled = true;
    btn.innerHTML = 'Sending...';
    fetch(form.action, { method: 'POST', body: new FormData(form) })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        msg.className = 'form-msg ' + (data.success ? 'form-msg--success' : 'form-msg--error');
        msg.textContent = data.success ? 'Thanks! We will get back to you shortly.' : (data.message || 'Something went wrong.');
        if (data.success) form.reset();
      })
      .catch(function () {
        msg.className = 'form-msg form-msg--error';
        msg.textContent = 'Could not send. Please call <?php echo htmlspecialchars(CONTACT_PHONE); ?>.';
      })
      .finally(function () {
        btn.disabled = false;
        btn.innerHTML = btnLabel;
      });
  });
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
