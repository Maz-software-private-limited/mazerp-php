<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require dirname(__DIR__) . '/includes/bootstrap.php';

$pageTitle = 'Books & GST guides';
$pageDescription = 'Guides for accounting and GST workflows in India: organization setup, documents, returns workspace, and month-end reports with MazERP Books.';
$pageCanonicalPath = 'guides';
$pageOgType = 'website';
$pageJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'MazERP Books guides',
    'description' => $pageDescription,
    'url' => absolute_url('guides/index.php'),
];

$guides = [
    [
        'title' => 'Getting started with GST in MazERP Books',
        'description' => 'A practical sequence from tax setup to returns workspace and closing reports.',
        'href' => route_url('guides/gst-books-getting-started.php'),
        'keywords' => 'GST billing software, accounting software India',
    ],
];

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>
<main id="main" class="legal-page guides-hub">
  <div class="container container--narrow">
    <h1>Books guides</h1>
    <p class="section__lead">Short reads for finance and operations teams running sales, purchases, and GST on one ledger.</p>
    <ul class="guides-list">
      <?php foreach ($guides as $guide): ?>
        <li class="guides-list__item">
          <a href="<?= e($guide['href']) ?>"><?= e($guide['title']) ?></a>
          <p><?= e($guide['description']) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    <p>Evaluating software? <a href="<?= e(section_url('features')) ?>">See MazERP Books features</a> or <a href="<?= e(section_url('contact')) ?>">request a walkthrough</a>.</p>
  </div>
</main>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
