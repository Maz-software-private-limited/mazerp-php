<section class="section" id="contact" aria-labelledby="contact-title">
  <div class="container contact">
    <div class="contact__intro">
      <h2 id="contact-title" class="section__title">See MazERP Books on your workflow</h2>
      <p class="section__lead">Tell us how you sell, buy, and file GST today. We will set up a walkthrough around documents, inventory, and returns.</p>
      <p class="contact__alt">Want to click through first? <a href="<?= e(get_started_url()) ?>">Open the Books app</a>.</p>
    </div>
    <form class="contact-form" action="<?= e(route_url('contact.php')) ?>" method="post" data-contact-form novalidate>
      <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token'] ?? '') ?>">
      <div class="form-field">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" autocomplete="name" required maxlength="120">
      </div>
      <div class="form-field">
        <label for="email">Work email</label>
        <input id="email" name="email" type="email" autocomplete="email" required maxlength="200">
      </div>
      <div class="form-field">
        <label for="company">Company</label>
        <input id="company" name="company" type="text" autocomplete="organization" maxlength="200">
      </div>
      <div class="form-field">
        <label for="employees">Team size (approx.)</label>
        <select id="employees" name="employees">
          <option value="">Select range</option>
          <option value="1-5">1–5</option>
          <option value="6-25">6–25</option>
          <option value="26-100">26–100</option>
          <option value="100+">100+</option>
        </select>
      </div>
      <div class="form-field">
        <label for="message">What should we cover on the call?</label>
        <textarea id="message" name="message" rows="4" maxlength="2000" placeholder="For example: GST setup, inventory tracking, or bank reconciliation."></textarea>
      </div>
      <p class="form-status" data-form-status role="status" aria-live="polite"></p>
      <button type="submit" class="btn btn--primary btn--lg">Request my walkthrough</button>
    </form>
  </div>
</section>
