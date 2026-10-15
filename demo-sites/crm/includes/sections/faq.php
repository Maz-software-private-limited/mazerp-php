<?php

declare(strict_types=1);

$faq = site_config()['faq'];
?>
<section class="crm-section" id="faq" aria-labelledby="faq-title">
  <div class="crm-wrap crm-wrap--narrow">
    <header class="crm-section__head">
      <h2 id="faq-title" class="crm-section__title">Common questions</h2>
      <p class="crm-section__lead">What teams usually ask before they move leads into MazERP CRM.</p>
    </header>
    <div class="crm-faq">
      <?php foreach ($faq as $index => $item): ?>
        <details class="crm-faq__item"<?= $index === 0 ? ' open' : '' ?>>
          <summary><?= e($item['question']) ?></summary>
          <p><?= e($item['answer']) ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
