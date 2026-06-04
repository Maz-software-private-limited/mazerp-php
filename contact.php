<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- PAGE HERO (shorter) -->
<section class="page-hero" style="padding:72px 0 64px;">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-envelope"></i> Contact</span>
    <h1>Get in touch</h1>
    <p>Book a demo, ask a question, or just say hello.</p>
  </div>
</section>

<!-- CONTACT MAIN -->
<section>
  <div class="container">
    <div class="contact-layout">

      <!-- LEFT: Contact Info -->
      <div class="contact-info reveal-left">
        <h2>We'd love to show you MazERP</h2>
        <p>Our team typically responds within one business hour. Whether you want a live walkthrough tailored to your industry or just have a quick question — reach out on any channel that works for you.</p>

        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div>
            <strong>Call Us</strong>
            <span><a href="tel:+918110087700">+91 81100 87700</a></span>
          </div>
        </div>

        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="fa-solid fa-envelope"></i>
          </div>
          <div>
            <strong>Email Us</strong>
            <span><a href="mailto:info@maztechno.com">info@maztechno.com</a></span>
          </div>
        </div>

        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="fa-solid fa-location-dot"></i>
          </div>
          <div>
            <strong>Visit Us</strong>
            <span>2nd Floor, Imperial Building<br>Tirunelveli, TN 627001</span>
          </div>
        </div>

        <a href="https://wa.me/918110087700?text=Hi%2C%20I%20want%20to%20know%20more%20about%20MazERP"
           class="btn btn-primary btn-lg" target="_blank" rel="noopener" style="background:linear-gradient(135deg,#075e54,#128c7e);border-color:#075e54;margin-top:12px;">
          <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
        </a>
      </div>

      <!-- RIGHT: Demo Request Form -->
      <div class="contact-form-wrap reveal-right">
        <div class="form-title">Book a Free Demo</div>

        <div class="form-msg" id="formMsg" role="alert" aria-live="polite"></div>

        <form id="demoForm" method="POST" action="api/submit.php" novalidate autocomplete="on">
          <!-- Honeypot -->
          <div style="display:none;" aria-hidden="true">
            <input type="text" name="website" tabindex="-1" autocomplete="off" aria-label="Website">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="f-name">Full Name <span aria-hidden="true">*</span></label>
              <input type="text" id="f-name" name="name" required placeholder="Your full name" autocomplete="name">
              <span class="form-error" id="err-name"></span>
            </div>
            <div class="form-group">
              <label for="f-email">Work Email <span aria-hidden="true">*</span></label>
              <input type="email" id="f-email" name="email" required placeholder="you@company.com" autocomplete="email">
              <span class="form-error" id="err-email"></span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="f-phone">Phone <span aria-hidden="true">*</span></label>
              <input type="tel" id="f-phone" name="phone" required placeholder="+91 98765 43210" autocomplete="tel">
              <span class="form-error" id="err-phone"></span>
            </div>
            <div class="form-group">
              <label for="f-company">Business Name <span aria-hidden="true">*</span></label>
              <input type="text" id="f-company" name="company" required placeholder="Your business name" autocomplete="organization">
              <span class="form-error" id="err-company"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="f-business">Business Type <span aria-hidden="true">*</span></label>
            <select id="f-business" name="business_type" required>
              <option value="">Select your business type</option>
              <option value="retail">Retail Store</option>
              <option value="restaurant">Restaurant</option>
              <option value="supermarket">Supermarket</option>
              <option value="pharmacy">Pharmacy</option>
              <option value="hardware">Hardware Shop</option>
              <option value="other">Other</option>
            </select>
            <span class="form-error" id="err-business"></span>
          </div>

          <div class="form-group">
            <label for="f-message">What are you looking for? <span style="color:var(--text-muted);font-weight:400;">(optional)</span></label>
            <textarea id="f-message" name="message" rows="4" placeholder="Tell us about your current challenges or what features matter most to you"></textarea>
            <span class="form-error" id="err-message"></span>
          </div>

          <div class="form-submit">
            <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
              <i class="fa-solid fa-paper-plane"></i> Book My Free Demo
            </button>
          </div>

          <p style="text-align:center;font-size:0.82rem;color:var(--text-muted);margin-top:14px;margin-bottom:0;">
            <i class="fa-solid fa-lock"></i> Your information is safe. We never share your data or send spam.
          </p>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- GETTING STARTED FAQ -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-circle-question"></i> FAQ</span>
      <h2>Common questions about demos and getting started</h2>
    </div>
    <div class="faq-wrap reveal">

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          What happens after I submit the demo request?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Our team will call you within one business hour to understand your business and schedule a demo. The demo is a live walkthrough of MazERP configured for your industry — not a generic slide presentation. After the demo you'll have access to a full 7-day free trial.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          How long does the demo take?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Most demos take 30 to 45 minutes. We cover the features most relevant to your business type, walk through a typical day's workflow, and answer all your questions. You can also ask us to focus on specific areas — billing, inventory, reporting, multi-store — and we'll tailor the session accordingly.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Is there any commitment after the demo?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>None at all. The demo is free with no obligation. After the demo you'll get access to a 7-day free trial — no credit card required. You only pay if you decide MazERP is the right fit for your business.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Can I set up MazERP myself without a demo?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Absolutely. You can sign up directly at <a href="https://app.mazerp.com/auth/register">app.mazerp.com</a> and start your free trial immediately. The setup wizard guides you through adding your business details, products, and tax rates. Most businesses are billing their first invoice within 30 minutes. Our support team is available if you need any help along the way.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FORM JAVASCRIPT -->
<script>
(function () {
  var form = document.getElementById('demoForm');
  var msg  = document.getElementById('formMsg');
  var btn  = document.getElementById('submitBtn');

  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Clear previous errors
    form.querySelectorAll('.form-error').forEach(function (el) { el.textContent = ''; });
    msg.textContent = '';
    msg.className = 'form-msg';

    // Validate
    var valid = true;
    var fields = [
      { id: 'f-name',     err: 'err-name',     msg: 'Please enter your full name.' },
      { id: 'f-email',    err: 'err-email',    msg: 'Please enter a valid email address.' },
      { id: 'f-phone',    err: 'err-phone',    msg: 'Please enter your phone number.' },
      { id: 'f-company',  err: 'err-company',  msg: 'Please enter your business name.' },
      { id: 'f-business', err: 'err-business', msg: 'Please select your business type.' }
    ];

    fields.forEach(function (f) {
      var el = document.getElementById(f.id);
      if (!el.value.trim()) {
        document.getElementById(f.err).textContent = f.msg;
        valid = false;
      }
    });

    if (!valid) return;

    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';

    fetch(form.action, {
      method: 'POST',
      body: new FormData(form)
    })
    .then(function (res) { return res.json(); })
    .then(function (data) {
      if (data.success) {
        msg.className = 'form-msg form-msg--success';
        msg.innerHTML = '<i class="fa-solid fa-circle-check"></i> Thanks! We\'ll call you within one business hour to confirm your demo.';
        form.reset();
      } else {
        msg.className = 'form-msg form-msg--error';
        msg.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> ' + (data.message || 'Something went wrong. Please try again or call us directly.');
      }
    })
    .catch(function () {
      msg.className = 'form-msg form-msg--error';
      msg.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Could not send your request. Please call us at +91 81100 87700.';
    })
    .finally(function () {
      btn.disabled = false;
      btn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Book My Free Demo';
    });
  });
})();
</script>

<!-- JSON-LD LocalBusiness Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "MazERP",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "499",
    "priceCurrency": "INR"
  },
  "publisher": {
    "@type": "LocalBusiness",
    "name": "MAZ Software Solutions",
    "url": "https://www.mazerp.com",
    "telephone": "+918110087700",
    "email": "info@maztechno.com",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "2nd Floor, Imperial Building",
      "addressLocality": "Tirunelveli",
      "addressRegion": "Tamil Nadu",
      "postalCode": "627001",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "8.7139",
      "longitude": "77.7567"
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
      "opens": "09:00",
      "closes": "18:00"
    },
    "sameAs": [
      "https://www.facebook.com/mazerp",
      "https://www.linkedin.com/company/mazerp"
    ]
  }
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
