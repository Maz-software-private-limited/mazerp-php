<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require dirname(__DIR__) . '/includes/bootstrap.php';

$pageTitle = 'GST and Books getting started';
$pageDescription = 'Getting started with MazERP Books for Indian GST workflows: organization setup, tax settings, daily documents, returns workspace, and month-end reports.';
$pageCanonicalPath = 'guides/gst-books-getting-started';
$pageOgType = 'article';
$published = '2026-10-12';
$articleUrl = absolute_url('guides/gst-books-getting-started.php');
$pageJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => 'Getting started with GST in MazERP Books',
    'description' => $pageDescription,
    'datePublished' => $published,
    'dateModified' => $published,
    'author' => ['@type' => 'Organization', 'name' => site_config()['company_name']],
    'publisher' => ['@type' => 'Organization', 'name' => site_config()['company_name']],
    'mainEntityOfPage' => $articleUrl,
];

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>
<main id="main" class="legal-page article">
  <div class="container container--narrow">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <ol class="breadcrumb__list">
        <li><a href="<?= e(route_url('')) ?>">Home</a></li>
        <li><a href="<?= e(route_url('guides/index.php')) ?>">Guides</a></li>
        <li aria-current="page">GST getting started</li>
      </ol>
    </nav>
    <header class="article__header">
      <h1>Getting started with GST in MazERP Books</h1>
      <p class="article__meta">Updated <?= e($published) ?></p>
    </header>
    <div class="article__body">
      <p>This guide outlines a practical sequence for teams moving sales, purchases, and GST work into Books. It is not tax advice—confirm filings and registrations with your advisor.</p>
      <h2>1. Set up organization and taxes</h2>
      <p>Add branches, GSTIN where applicable, and tax settings so invoices and bills pick up the right rates and place-of-supply rules.</p>
      <h2>2. Bring over masters</h2>
      <p>Create or import customers, vendors, items, and units. Align SKU and HSN/SAC codes before high-volume billing.</p>
      <h2>3. Post day-to-day documents</h2>
      <p>Issue tax invoices, record bills, and capture payments as work happens. Stock movements should flow from the same item records you bill.</p>
      <h2>4. Reconcile cash and balances</h2>
      <p>Connect bank accounts, categorize statement lines, and review receivables and payables while the period is still open.</p>
      <h2>5. Walk through the returns workspace</h2>
      <p>For each return period, open GSTR-1, GSTR-2, and GSTR-3B views in Books and reconcile summaries against your source documents before filing on the portal.</p>
      <h2>6. Close with reports</h2>
      <p>Run profit and loss, balance sheet, and party statements to confirm the period before you share numbers externally.</p>
    </div>
    <p class="article__footer-cta"><a href="<?= e(section_url('contact')) ?>">Request a walkthrough</a> or <a href="<?= e(get_started_url()) ?>">open the Books app</a>.</p>
  </div>
</main>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
