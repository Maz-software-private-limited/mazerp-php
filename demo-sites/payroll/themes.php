<?php

declare(strict_types=1);

session_start();
require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Theme previews';
$pageDescription = 'Compare MazERP Payroll marketing themes: payroll, payroll_2, payroll_3, payroll_4, payroll_5.';
$pageNoindex = true;

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="legal-page">
  <div class="container container--narrow">
    <h1>Marketing theme previews</h1>
    <p class="article__lead">Five switchable styles. Set production default with <code>MAZERP_THEME</code> or <code>default_theme</code> in <code>config.php</code>. Preview any theme with <code>?theme=…</code> on the homepage (links keep the query while you browse).</p>
    <ul class="guides-list theme-list">
      <?php foreach (theme_registry() as $id => $meta): ?>
        <li class="guides-list__item theme-list__item">
          <a href="<?= e(theme_preview_url($id)) ?>"><?= e($meta['label']) ?> <span class="theme-list__id">(<?= e($id) ?>)</span></a>
          <?php if ($id === active_theme_id() && isset($_GET['theme'])): ?>
            <p class="theme-list__active">Currently previewing this theme.</p>
          <?php endif; ?>
          <p><?= e($meta['description']) ?></p>
          <p class="theme-list__meta">Hero: <?= e((string) $meta['hero']) ?> · Header: <?= e((string) $meta['header']) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    <p><a href="<?= e(route_url('')) ?>">Back to homepage</a><?php if (isset($_GET['theme'])): ?> · <a href="<?= e(base_path() === '' ? '/' : base_path() . '/') ?>">Clear theme preview</a><?php endif; ?></p>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
