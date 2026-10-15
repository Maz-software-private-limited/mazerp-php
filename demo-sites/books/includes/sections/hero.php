<?php

declare(strict_types=1);

$theme = active_theme();
$heroVariant = (string) ($theme['hero'] ?? 'light');
$showTrust = !empty($theme['hero_trust']);
$eyebrow = (string) ($theme['hero_eyebrow'] ?? 'Books & accounting for India');
$secondaryBtnClass = $heroVariant === 'gateway' || $heroVariant === 'ink' ? ' btn--on-dark' : '';
?>
<section class="hero hero--<?= e($heroVariant) ?>" id="top" aria-labelledby="hero-title">
  <?php if (in_array($heroVariant, ['gateway', 'glass', 'split'], true)): ?>
    <div class="hero__backdrop" aria-hidden="true"></div>
  <?php endif; ?>
  <div class="container hero__grid">
    <div class="hero__copy">
      <p class="hero__eyebrow"><?= e($eyebrow) ?></p>
      <h1 id="hero-title" class="hero__title">Run your books from first invoice to month-end close</h1>
      <p class="hero__lead">
        MazERP Books keeps sales, purchases, inventory, banking, and GST work on one ledger—so receivables, payables, and return summaries reflect the same transactions your team records every day.
      </p>
      <div class="hero__cta">
        <a class="btn btn--primary btn--lg" href="<?= e(get_started_url()) ?>">Open Books app</a>
        <a class="btn btn--secondary<?= $secondaryBtnClass ?> btn--lg" href="<?= e(section_url('contact')) ?>">Request a walkthrough</a>
      </div>
      <?php if ($showTrust): ?>
      <ul class="hero__trust">
        <li>Invoices &amp; bills linked to stock</li>
        <li>GST returns workspace</li>
        <li>Reports from live data</li>
      </ul>
      <?php endif; ?>
      <p class="hero__note">Setting up GST filing? Read our <a href="<?= e(route_url('guides/gst-books-getting-started.php')) ?>">GST and Books getting-started guide</a>. Already on MazERP? <a href="<?= e(login_url()) ?>">Log in to Books</a>.</p>
    </div>
    <div class="hero__visual" aria-hidden="true">
      <?php require __DIR__ . '/dashboard-mockup.php'; ?>
    </div>
  </div>
</section>
