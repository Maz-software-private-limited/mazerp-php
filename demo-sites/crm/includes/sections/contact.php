<section class="crm-section crm-section--wash" id="contact" aria-labelledby="contact-title">
  <div class="crm-wrap crm-contact">
    <div class="crm-contact__intro">
      <h2 id="contact-title" class="crm-section__title">Book a demo</h2>
      <p class="crm-section__lead">Tell us how you capture leads and run follow-ups today. We will set up a walkthrough around pipeline, follow-ups, and reports.</p>
      <p class="crm-contact__alt">Prefer to explore first? <a href="<?= e(get_started_url()) ?>">Start free in the CRM app</a>.</p>
    </div>
    <form class="crm-form" action="<?= e(route_url('contact.php')) ?>" method="post" data-contact-form novalidate>
      <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token'] ?? '') ?>">
      <div class="crm-form__field">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" autocomplete="name" required maxlength="120">
      </div>
      <div class="crm-form__field">
        <label for="email">Work email</label>
        <input id="email" name="email" type="email" autocomplete="email" required maxlength="200">
      </div>
      <div class="crm-form__field">
        <label for="company">Company</label>
        <input id="company" name="company" type="text" autocomplete="organization" maxlength="200">
      </div>
      <div class="crm-form__field">
        <label for="employees">Sales team size (approx.)</label>
        <select id="employees" name="employees">
          <option value="">Select range</option>
          <option value="1-5">1–5</option>
          <option value="6-25">6–25</option>
          <option value="26-100">26–100</option>
          <option value="100+">100+</option>
        </select>
      </div>
      <div class="crm-form__field">
        <label for="message">What should we cover?</label>
        <textarea id="message" name="message" rows="4" maxlength="2000" placeholder="For example: lead import, telecaller workflow, or deal pipeline stages."></textarea>
      </div>
      <p class="crm-form__status" data-form-status role="status" aria-live="polite"></p>
      <button type="submit" class="crm-btn crm-btn--solid crm-btn--lg">Request a demo</button>
    </form>
  </div>
</section>
