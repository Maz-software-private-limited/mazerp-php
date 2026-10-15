<?php

declare(strict_types=1);

$contactPhone = contact_phone_display();
$contactEmail = contact_email_display();
$telHref = contact_tel_href();
$whatsappHref = contact_whatsapp_href();
?>
<section class="section" id="contact" aria-labelledby="contact-title">
  <div class="container contact">
    <div class="contact__intro">
      <h2 id="contact-title" class="section__title">See MazERP Payroll on your payroll cycle</h2>
      <p class="section__lead">Tell us how many people you pay and what you use today. We'll set up a walkthrough around structures, statutory setup, and monthly approval.</p>

      <div class="contact-channels" aria-label="Contact MazERP">
        <h3 class="contact-channels__title">Reach us directly</h3>
        <ul class="contact-channels__list">
          <?php if ($contactPhone !== '' && $telHref !== ''): ?>
          <li class="contact-channel">
            <span class="contact-channel__icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.07 21 3 13.93 3 5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z" fill="currentColor"/></svg>
            </span>
            <div class="contact-channel__body">
              <span class="contact-channel__label">Phone</span>
              <a class="contact-channel__value" href="<?= e($telHref) ?>"><?= e($contactPhone) ?></a>
            </div>
          </li>
          <?php endif; ?>
          <?php if ($contactEmail !== ''): ?>
          <li class="contact-channel">
            <span class="contact-channel__icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h16a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2zm0 2v.01L12 13l8-4.99V8H4zm0 8h16v-6.01l-7.29 4.55a1 1 0 01-1.02 0L4 9.99V16z" fill="currentColor"/></svg>
            </span>
            <div class="contact-channel__body">
              <span class="contact-channel__label">Email</span>
              <a class="contact-channel__value" href="mailto:<?= e($contactEmail) ?>"><?= e($contactEmail) ?></a>
            </div>
          </li>
          <?php endif; ?>
        </ul>
        <?php if ($whatsappHref !== ''): ?>
        <a class="btn btn--whatsapp btn--lg contact-channels__whatsapp" href="<?= e($whatsappHref) ?>" target="_blank" rel="noopener noreferrer">
          <svg class="btn__icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Chat on WhatsApp
        </a>
        <?php endif; ?>
        <?php
        $socialLinksModifier = 'social-links--contact';
        $socialLinksHeading = 'Connect with us';
        require __DIR__ . '/../partials/social-links.php';
        ?>
      </div>

      <p class="contact__alt">Want to click through first? <a href="<?= e(get_started_url()) ?>">Open the payroll app</a>.</p>
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
        <label for="employees">How many employees do you pay?</label>
        <select id="employees" name="employees">
          <option value="">Select range</option>
          <option value="1-25">1–25</option>
          <option value="26-100">26–100</option>
          <option value="101-500">101–500</option>
          <option value="500+">500+</option>
        </select>
      </div>
      <div class="form-field">
        <label for="message">What should we cover on the call?</label>
        <textarea id="message" name="message" rows="4" maxlength="2000" placeholder="For example: PF/ESI setup, LOP rules, or approval workflow."></textarea>
      </div>
      <p class="form-status" data-form-status role="status" aria-live="polite"></p>
      <button type="submit" class="btn btn--primary btn--lg">Book my walkthrough</button>
    </form>
  </div>
</section>
