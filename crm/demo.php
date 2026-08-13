<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <div class="crm-eyebrow">Book a Demo</div>
    <h1>See Maz CRM on your sales process</h1>
    <p>A live walkthrough of leads, pipeline, follow-ups, and reports — tailored to your industry. Free, no obligation.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container" style="max-width:720px;">
    <div class="crm-form-card">
      <h2 class="h4 fw-bold mb-1">Request your free demo</h2>
      <p class="text-secondary small mb-3">We will call within one business hour to schedule a session that fits your team.</p>
      <div id="formMsg" class="form-msg" role="status" aria-live="polite"></div>
      <form id="crmDemoForm" action="../api/submit.php" method="post" novalidate>
        <input type="hidden" name="source" value="crm-microsite">
        <input type="hidden" name="intent" value="demo">
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
              <option value="other">Other / B2B / Agency</option>
            </select>
            <div class="form-error" id="err-business"></div>
          </div>
          <div class="col-12">
            <label class="form-label" for="f-message">What should we focus on?</label>
            <textarea class="form-control" id="f-message" name="message" rows="4" placeholder="Leads, pipeline, follow-ups, team reports..."></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100" id="submitBtn">Book My Free Demo</button>
            <p class="text-center small text-secondary mt-3 mb-0">Prefer to explore yourself? <a href="signup.php">Start a free trial</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
(function () {
  var form = document.getElementById('crmDemoForm');
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
        msg.textContent = data.success ? 'Thanks! We will call within one business hour to confirm your demo.' : (data.message || 'Something went wrong.');
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
