<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-page-hero">
  <div class="container">
    <nav class="crm-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(crm_url('index')); ?>">Home</a> / Contact
    </nav>
    <div class="crm-eyebrow">Contact / Demo</div>
    <h1>Book a Maz CRM demo</h1>
    <p>Tell us about your team size and sales process. We will walk you through leads, pipeline, follow-ups, and reports.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <h2 class="h4 fw-bold mb-3">Talk to our team</h2>
        <p class="text-secondary">Prefer to explore on your own? <a href="<?php echo htmlspecialchars(CRM_SIGNUP_URL); ?>">Start free</a> anytime.</p>
        <div class="d-flex gap-3 mb-3">
          <div class="crm-plan-icon blue"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
          <div>
            <div class="fw-semibold">Call</div>
            <a href="tel:+918110087700"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a>
          </div>
        </div>
        <div class="d-flex gap-3 mb-3">
          <div class="crm-plan-icon blue"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
          <div>
            <div class="fw-semibold">Email</div>
            <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a>
          </div>
        </div>
        <div class="d-flex gap-3">
          <div class="crm-plan-icon blue"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></div>
          <div>
            <div class="fw-semibold">WhatsApp</div>
            <a href="https://wa.me/<?php echo htmlspecialchars(WHATSAPP_NUMBER); ?>" target="_blank" rel="noopener">Chat with us</a>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="crm-form-card">
          <h2 class="h4 fw-bold mb-1">Demo request</h2>
          <p class="text-secondary small mb-3">We only ask for what we need to schedule a relevant walkthrough.</p>
          <div id="formMsg" class="form-msg" role="status" aria-live="polite"></div>
          <form id="crmContactForm" action="../api/submit.php" method="post" novalidate>
            <input type="hidden" name="source" value="crm-microsite">
            <input type="hidden" name="intent" value="demo">
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" class="d-none" aria-hidden="true">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="f-name">Full name *</label>
                <input type="text" class="form-control" id="f-name" name="name" autocomplete="name" required>
                <div class="form-error" id="err-name"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-email">Business email *</label>
                <input type="email" class="form-control" id="f-email" name="email" autocomplete="email" required>
                <div class="form-error" id="err-email"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-company">Company name *</label>
                <input type="text" class="form-control" id="f-company" name="company" autocomplete="organization" required>
                <div class="form-error" id="err-company"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-phone">Phone number *</label>
                <input type="tel" class="form-control" id="f-phone" name="phone" autocomplete="tel" required>
                <div class="form-error" id="err-phone"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-employees">Sales team size *</label>
                <select class="form-select" id="f-employees" name="employee_count" required>
                  <option value="">Select range</option>
                  <option value="1-5">1–5</option>
                  <option value="6-15">6–15</option>
                  <option value="16-50">16–50</option>
                  <option value="51-100">51–100</option>
                  <option value="100+">100+</option>
                </select>
                <div class="form-error" id="err-employees"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-business">Business type *</label>
                <select class="form-select" id="f-business" name="business_type" required>
                  <option value="">Select type</option>
                  <option value="retail">Retail / Trading</option>
                  <option value="real-estate">Real Estate</option>
                  <option value="agencies">Agency / Marketing</option>
                  <option value="services">Services</option>
                  <option value="distributors">Distribution</option>
                  <option value="b2b">B2B Sales</option>
                  <option value="other">Other</option>
                </select>
                <div class="form-error" id="err-business"></div>
              </div>
              <div class="col-12">
                <label class="form-label" for="f-message">Message</label>
                <textarea class="form-control" id="f-message" name="message" rows="4" placeholder="Tell us about your sales process or demo goals"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100" id="submitBtn">Request demo</button>
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
  if (!form || !btn) return;

  function setError(id, errId, text) {
    var el = document.getElementById(id);
    var err = document.getElementById(errId);
    if (!el || !err) return;
    err.textContent = text || '';
    err.classList.toggle('is-visible', !!text);
    el.classList.toggle('is-invalid', !!text);
  }

  function validEmail(v) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    msg.textContent = '';
    msg.className = 'form-msg';
    var valid = true;

    var nameEl = document.getElementById('f-name');
    var emailEl = document.getElementById('f-email');
    var phoneEl = document.getElementById('f-phone');
    var companyEl = document.getElementById('f-company');
    var empEl = document.getElementById('f-employees');
    var bizEl = document.getElementById('f-business');
    var messageEl = document.getElementById('f-message');

    setError('f-name', 'err-name', nameEl.value.trim().length < 2 ? 'Please enter your full name.' : '');
    setError('f-email', 'err-email', !validEmail(emailEl.value.trim()) ? 'Please enter a valid business email.' : '');
    setError('f-phone', 'err-phone', phoneEl.value.trim().length < 8 ? 'Please enter a valid phone number.' : '');
    setError('f-company', 'err-company', !companyEl.value.trim() ? 'Please enter your company name.' : '');
    setError('f-employees', 'err-employees', !empEl.value ? 'Please select sales team size.' : '');
    setError('f-business', 'err-business', !bizEl.value ? 'Please select your business type.' : '');

    if (
      nameEl.value.trim().length < 2 ||
      !validEmail(emailEl.value.trim()) ||
      phoneEl.value.trim().length < 8 ||
      !companyEl.value.trim() ||
      !empEl.value ||
      !bizEl.value
    ) {
      valid = false;
    }
    if (!valid) return;

    var employeesNote = 'Sales team size: ' + empEl.value;
    var bizLabel = bizEl.options[bizEl.selectedIndex] ? bizEl.options[bizEl.selectedIndex].text : bizEl.value;
    var metaNote = employeesNote + '\nBusiness type: ' + bizLabel;
    var originalMessage = messageEl.value;
    if (originalMessage.trim()) {
      messageEl.value = metaNote + '\n' + originalMessage;
    } else {
      messageEl.value = metaNote;
    }

    btn.disabled = true;
    btn.classList.add('is-loading');
    btn.setAttribute('aria-busy', 'true');

    fetch(form.action, { method: 'POST', body: new FormData(form) })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        msg.className = 'form-msg is-visible ' + (data.success ? 'form-msg--success' : 'form-msg--error');
        msg.textContent = data.success
          ? 'Thanks! Our team will contact you shortly about your CRM demo.'
          : (data.message || 'Something went wrong.');
        if (data.success) form.reset();
        else messageEl.value = originalMessage;
      })
      .catch(function () {
        messageEl.value = originalMessage;
        msg.className = 'form-msg is-visible form-msg--error';
        msg.textContent = 'Could not send. Please call <?php echo htmlspecialchars(CONTACT_PHONE); ?>.';
      })
      .finally(function () {
        btn.disabled = false;
        btn.classList.remove('is-loading');
        btn.removeAttribute('aria-busy');
      });
  });
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
