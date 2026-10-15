<?php

declare(strict_types=1);

$theme = active_theme();
$heroVariant = (string) ($theme['hero'] ?? 'light');
$showTrust = !empty($theme['hero_trust']);
$eyebrow = (string) ($theme['hero_eyebrow'] ?? 'Payroll for India');
$secondaryBtnClass = in_array($heroVariant, ['gateway', 'ink', 'split'], true) ? ' btn--on-dark' : '';
?>
<section class="hero hero--<?= e($heroVariant) ?>" id="top" aria-labelledby="hero-title">
  <?php if (in_array($heroVariant, ['gateway', 'glass', 'split'], true)): ?>
    <div class="hero__backdrop" aria-hidden="true"></div>
  <?php endif; ?>
  <div class="container hero__grid">
    <div class="hero__copy">
      <p class="hero__eyebrow"><?= e($eyebrow) ?></p>
      <h1 id="hero-title" class="hero__title">Payroll software India for monthly runs—from salary to payslip</h1>
      <p class="hero__lead">
        MazERP Payroll is payroll software India teams use to run salary structures, attendance, leave, overtime, and statutory deductions in one monthly workflow—then approve and generate payslips without reconciling spreadsheets.
      </p>
      <?php require __DIR__ . '/hero-pricing.php'; ?>
      <div class="hero__cta">
        <a class="btn btn--primary btn--lg" href="<?= e(get_started_url()) ?>">Open payroll app</a>
        <a class="btn btn--secondary<?= $secondaryBtnClass ?> btn--lg" href="<?= e(section_url('contact')) ?>">Book a walkthrough</a>
      </div>
      <?php if ($showTrust): ?>
      <ul class="hero__trust">
        <li>PF, ESI &amp; TDS in one workflow</li>
        <li>Attendance &amp; LOP aligned</li>
        <li>Payslips after approval</li>
      </ul>
      <?php endif; ?>
      <p class="hero__note">New to payroll here? See <a href="<?= e(section_url('how-it-works')) ?>">how monthly payroll works</a>. Already on MazERP? <a href="<?= e(login_url()) ?>">Log in to payroll</a>.</p>
    </div>
    <div class="hero__visual" aria-hidden="true">
      <?php require __DIR__ . '/dashboard-mockup.php'; ?>
    </div>
  </div>
</section>
