<?php

declare(strict_types=1);

$faq = site_config()['faq'];
?>
<section class="section section--muted" id="faq" aria-labelledby="faq-title">
  <div class="container container--narrow">
    <header class="section__header">
      <h2 id="faq-title" class="section__title">Questions before you switch</h2>
      <p class="section__lead">Straight answers about fit, setup, and what happens after you sign in.</p>
    </header>
    <div class="faq" data-faq>
      <?php foreach ($faq as $index => $item): ?>
        <details class="faq__item"<?= $index === 0 ? ' open' : '' ?>>
          <summary class="faq__question"><?= e($item['question']) ?></summary>
          <div class="faq__answer">
            <p><?= e($item['answer']) ?></p>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
