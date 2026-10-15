<?php

declare(strict_types=1);

$suite = site_config()['suite_name'];
?>
<section class="crm-section crm-section--wash" id="security" aria-labelledby="security-title">
  <div class="crm-wrap">
    <header class="crm-section__head crm-section__head--center">
      <p class="crm-section__kicker">Trust &amp; privacy</p>
      <h2 id="security-title" class="crm-section__title">Security and data protection</h2>
      <p class="crm-section__lead">Your CRM data lives in your <?= e($suite) ?> workspace—not on this marketing site.</p>
    </header>
    <ul class="crm-security-cards">
      <li class="crm-security-card">
        <span class="crm-security-card__icon" aria-hidden="true"><?= marketing_icon('lock') ?></span>
        <h3 class="crm-security-card__title">Authenticated access</h3>
        <p>Sign-in uses MazERP console authentication. Product access follows the roles configured in your workspace.</p>
      </li>
      <li class="crm-security-card">
        <span class="crm-security-card__icon" aria-hidden="true"><?= marketing_icon('shield') ?></span>
        <h3 class="crm-security-card__title">Your environment</h3>
        <p>Business records stay where you deploy. Ask us about hosting, backups, and access controls for your team.</p>
      </li>
      <li class="crm-security-card">
        <span class="crm-security-card__icon" aria-hidden="true"><?= marketing_icon('file-text') ?></span>
        <h3 class="crm-security-card__title">Demo form data</h3>
        <p>Requests submitted on this site store only what you enter until you configure email delivery for leads.</p>
      </li>
    </ul>
  </div>
</section>
