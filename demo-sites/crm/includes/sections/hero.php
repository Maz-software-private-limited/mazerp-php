<?php

declare(strict_types=1);

$c = site_config();
?>
<section class="crm-hero crm-hero--home" aria-labelledby="hero-title">
  <div class="crm-hero__backdrop" aria-hidden="true"></div>
  <div class="crm-wrap crm-hero__grid">
    <div class="crm-hero__copy">
      <h1 id="hero-title" class="crm-hero__title">Manage leads, grow relationships, close more deals</h1>
      <p class="crm-hero__lead">Give your sales team one workspace for lead capture, follow-ups, pipeline stages, and customer history—without spreadsheets or missed calls.</p>
      <ul class="crm-hero__checks">
        <li>Capture website, WhatsApp, and walk-in inquiries with clear owners</li>
        <li>Work today and overdue follow-ups from one telecaller queue</li>
        <li>Coach the pipeline with stage value and aging managers can trust</li>
      </ul>
      <div class="crm-hero__actions">
        <a class="crm-btn crm-btn--solid crm-btn--lg" href="<?= e(get_started_url()) ?>">Start free</a>
        <a class="crm-btn crm-btn--outline crm-btn--on-dark crm-btn--lg" href="<?= e(section_url('contact')) ?>">Book a demo</a>
      </div>
      <p class="crm-hero__meta">
        Built for sales managers and telecallers in India.
        <a href="<?= e(login_url()) ?>">Log in to <?= e($c['suite_name']) ?></a>
      </p>
    </div>
    <div class="crm-hero__visual" aria-hidden="true">
      <div class="crm-hero__visual-glow"></div>
      <?php $mockCompact = true; require dirname(__DIR__) . '/partials/mock-pipeline-kanban.php'; ?>
    </div>
  </div>
  <div class="crm-wrap">
    <dl class="crm-hero__strip">
      <div>
        <dt>Pipeline</dt>
        <dd>Deals board from New to Won</dd>
      </div>
      <div>
        <dt>Leads</dt>
        <dd>Kanban by status and assignee</dd>
      </div>
      <div>
        <dt>Follow-ups</dt>
        <dd>Today, overdue, and attempt history</dd>
      </div>
      <div>
        <dt>Reports</dt>
        <dd>Conversion and team output</dd>
      </div>
    </dl>
  </div>
</section>
