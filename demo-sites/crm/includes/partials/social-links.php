<?php

declare(strict_types=1);

/** @var string $socialLinksModifier optional BEM modifier e.g. social-links--footer */
$socialLinksModifier = $socialLinksModifier ?? '';
/** @var string $socialLinksHeading visible label beside icons (optional) */
$socialLinksHeading = $socialLinksHeading ?? '';
$links = social_links();
if ($links === []) {
    return;
}
$modifierClass = $socialLinksModifier !== '' ? ' ' . $socialLinksModifier : '';
$headingId = $socialLinksHeading !== '' ? 'social-links-heading-' . substr(md5($socialLinksModifier . $socialLinksHeading), 0, 8) : '';
?>
<div class="social-links<?= e($modifierClass) ?>"<?= $headingId !== '' ? ' aria-labelledby="' . e($headingId) . '"' : '' ?>>
  <div class="social-links__bar">
    <?php if ($socialLinksHeading !== ''): ?>
      <p id="<?= e($headingId) ?>" class="social-links__heading"><?= e($socialLinksHeading) ?></p>
    <?php endif; ?>
    <ul class="social-links__list">
      <?php foreach ($links as $link): ?>
        <li>
          <a
            class="social-links__link social-links__link--<?= e($link['id']) ?>"
            href="<?= e($link['url']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?= e($link['label']) ?> (opens in new tab)"
          >
            <?php if ($link['id'] === 'facebook'): ?>
              <svg class="social-links__icon" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
            <?php elseif ($link['id'] === 'instagram'): ?>
              <svg class="social-links__icon" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.805.249 2.227.413a4.92 4.92 0 011.802 1.173 4.92 4.92 0 011.173 1.802c.164.422.359 1.057.413 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.249 1.805-.413 2.227a4.92 4.92 0 01-1.173 1.802 4.92 4.92 0 01-1.802 1.173c-.422.164-1.057.359-2.227.413-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.805-.249-2.227-.413a4.92 4.92 0 01-1.802-1.173 4.92 4.92 0 01-1.173-1.802c-.164-.422-.359-1.057-.413-2.227C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.054-1.17.249-1.805.413-2.227a4.92 4.92 0 011.173-1.802 4.92 4.92 0 011.802-1.173c.422-.164 1.057-.359 2.227-.413C8.416 2.175 8.796 2.163 12 2.163zM12 0C8.741 0 8.333.014 7.053.072 5.775.132 4.905.333 4.14.63a7.11 7.11 0 00-2.597 1.69A7.11 7.11 0 00.63 4.14C.333 4.905.132 5.775.072 7.053.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.06 1.278.261 2.148.558 2.913a7.11 7.11 0 001.69 2.597 7.11 7.11 0 002.597 1.69c.765.297 1.635.498 2.913.558C8.333 23.986 8.741 24 12 24s3.667-.014 4.947-.072c1.278-.06 2.148-.261 2.913-.558a7.11 7.11 0 002.597-1.69 7.11 7.11 0 001.69-2.597c.297-.765.498-1.635.558-2.913.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.06-1.278-.261-2.148-.558-2.913a7.11 7.11 0 00-1.69-2.597 7.11 7.11 0 00-2.597-1.69C19.095.333 18.225.132 16.947.072 15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.881 0 1.44 1.44 0 012.881 0z"/></svg>
            <?php elseif ($link['id'] === 'linkedin'): ?>
              <svg class="social-links__icon" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 114.126 0 2.063 2.063 0 01-2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            <?php else: ?>
              <svg class="social-links__icon" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            <?php endif; ?>
            <span class="crm-visually-hidden"><?= e($link['label']) ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
