<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="payroll-page-hero">
  <div class="container">
    <nav class="payroll-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo htmlspecialchars(payroll_url('index')); ?>">Home</a> / Contact
    </nav>
    <div class="payroll-eyebrow">Contact / Demo</div>
    <h1>Book a Maz Payroll demo</h1>
    <p>Tell us about your team size and payroll needs. We will walk you through employees, salary, statutory components, and payroll runs.</p>
  </div>
</section>

<section class="payroll-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <h2 class="h4 fw-bold mb-3">Talk to our team</h2>
        <p class="text-secondary">Prefer to explore on your own? <a href="<?php echo htmlspecialchars(PAYROLL_SIGNUP_URL); ?>">Start free</a> anytime.</p>
        <div class="d-flex gap-3 mb-3">
          <div class="payroll-plan-icon teal"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
          <div>
            <div class="fw-semibold">Call</div>
            <a href="tel:+918110087700"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a>
          </div>
        </div>
        <div class="d-flex gap-3 mb-3">
          <div class="payroll-plan-icon teal"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
          <div>
            <div class="fw-semibold">Email</div>
            <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a>
          </div>
        </div>
        <div class="d-flex gap-3">
          <div class="payroll-plan-icon teal"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></div>
          <div>
            <div class="fw-semibold">WhatsApp</div>
            <a href="https://wa.me/<?php echo htmlspecialchars(WHATSAPP_NUMBER); ?>" target="_blank" rel="noopener">Chat with us</a>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="payroll-form-card">
          <h2 class="h4 fw-bold mb-1">Demo request</h2>
          <p class="text-secondary small mb-3">We only ask for what we need to schedule a relevant walkthrough.</p>
          <div id="formMsg" class="form-msg" role="status" aria-live="polite"></div>
          <form id="payrollContactForm" action="api/submit.php" method="post" novalidate>
            <input type="hidden" name="source" value="payroll-microsite">
            <input type="hidden" name="intent" value="demo">
            <input type="hidden" name="product" value="payroll">
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
                <label class="form-label" for="f-employees">Number of employees *</label>
                <select class="form-select" id="f-employees" name="employee_count" required>
                  <option value="">Select range</option>
                  <option value="1-25">1–25</option>
                  <option value="26-50">26–50</option>
                  <option value="51-100">51–100</option>
                  <option value="101-250">101–250</option>
                  <option value="250+">250+</option>
                </select>
                <div class="form-error" id="err-employees"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="f-business">Business type *</label>
                <select class="form-select" id="f-business" name="business_type" required>
                  <option value="">Select type</option>
                  <option value="retail">Retail / Trading</option>
                  <option value="services">Services</option>
                  <option value="manufacturing">Manufacturing</option>
                  <option value="technology">Technology / SaaS</option>
                  <option value="other">Other</option>
                </select>
                <div class="form-error" id="err-business"></div>
              </div>
              <div class="col-12">
                <label class="form-label" for="f-message">Message</label>
                <textarea class="form-control" id="f-message" name="message" rows="4" placeholder="Tell us about your payroll process or demo goals"></textarea>
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
  var form = document.getElementById('payrollContactForm');
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

    setError('f-name', 'err-name', nameEl.value.trim().length < 2 ? 'Please enter your full name.' : '');
    setError('f-email', 'err-email', !validEmail(emailEl.value.trim()) ? 'Please enter a valid business email.' : '');
    setError('f-phone', 'err-phone', phoneEl.value.trim().length < 8 ? 'Please enter a valid phone number.' : '');
    setError('f-company', 'err-company', !companyEl.value.trim() ? 'Please enter your company name.' : '');
    setError('f-employees', 'err-employees', !empEl.value ? 'Please select number of employees.' : '');
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

    btn.disabled = true;
    btn.classList.add('is-loading');
    btn.setAttribute('aria-busy', 'true');

    fetch(form.action, { method: 'POST', body: new FormData(form) })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        msg.className = 'form-msg is-visible ' + (data.success ? 'form-msg--success' : 'form-msg--error');
        msg.textContent = data.success
          ? 'Thanks! Our team will contact you shortly about your payroll demo.'
          : (data.message || 'Something went wrong.');
        if (data.success) form.reset();
      })
      .catch(function () {
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
