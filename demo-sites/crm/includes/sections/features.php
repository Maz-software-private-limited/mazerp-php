<?php
$featuresHeadingTag = !empty($isSectionPage) ? 'h1' : 'h2';
?>
<section class="crm-section crm-section--wash<?= !empty($isSectionPage) ? ' crm-section--page' : '' ?>" id="features" aria-labelledby="features-title">
  <div class="crm-wrap">
    <header class="crm-section__head crm-section__head--center">
      <?php if (!empty($isSectionPage)): ?>
        <?php require __DIR__ . '/../partials/section-breadcrumb.php'; ?>
        <<?= $featuresHeadingTag ?> id="features-title" class="crm-section__title"><?= e((string) ($sectionMeta['title'] ?? 'CRM features')) ?></<?= $featuresHeadingTag ?>>
        <?php if (!empty($sectionMeta['description'])): ?>
          <p class="crm-section__lead"><?= e((string) $sectionMeta['description']) ?></p>
        <?php endif; ?>
      <?php else: ?>
        <p class="crm-section__kicker">Capabilities</p>
        <h2 id="features-title" class="crm-section__title">Everything you need to run sales</h2>
        <p class="crm-section__lead">Each module mirrors what you will find in the live app: lead inbox, deal boards, telecaller queues, contact timelines, and manager reports—no decorative feature lists.</p>
      <?php endif; ?>
    </header>
    <ul class="crm-features">
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('users') ?></span>
        <h3 class="crm-feature__title">Lead management</h3>
        <p>Capture, score, and assign leads from forms, WhatsApp, walk-ins, and campaigns.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('contact') ?></span>
        <h3 class="crm-feature__title">Customer management</h3>
        <p>Profiles with history, outstanding context, and communication logs.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('columns') ?></span>
        <h3 class="crm-feature__title">Sales pipeline</h3>
        <p>Visual stages so every deal has an owner, next step, and expected value.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('phone') ?></span>
        <h3 class="crm-feature__title">Follow-ups</h3>
        <p>Today and overdue queues with attempt logs against each lead or deal.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('list-check') ?></span>
        <h3 class="crm-feature__title">Tasks &amp; activities</h3>
        <p>Assign work and keep activity history tied to the right record.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('target') ?></span>
        <h3 class="crm-feature__title">Team / agents</h3>
        <p>Roles, ownership, and performance visibility across your sales floor.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('chart') ?></span>
        <h3 class="crm-feature__title">Reports</h3>
        <p>Lead sources, conversion, aging, and team reports from one hub.</p>
      </li>
      <li class="crm-feature">
        <span class="crm-feature__icon"><?= marketing_icon('file-text') ?></span>
        <h3 class="crm-feature__title">Communication history</h3>
        <p>Calls, notes, and follow-ups stay on the record for clean handovers.</p>
      </li>
    </ul>
    <p class="crm-features__more"><a href="<?= e(section_url('preview')) ?>">See product preview</a></p>
  </div>
</section>
