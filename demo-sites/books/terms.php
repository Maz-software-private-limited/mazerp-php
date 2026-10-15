<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Terms';
$pageDescription = 'Terms of use for the MazERP Books marketing site.';
$pageCanonicalPath = 'terms';
$pageJsonLd = null;

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="legal-page">
  <div class="container container--narrow">
    <h1>Terms of use</h1>
    <p>This website promotes MazERP Books. By using this site, you agree to use it only for lawful purposes and not to attempt to disrupt or misuse the service.</p>
    <h2>No warranty</h2>
    <p>Content on this site is provided for general information. Features and availability may change. The Books product is offered under separate terms when you subscribe or sign in.</p>
    <h2>Links to MazERP apps</h2>
    <p>Links to the console and Books application are provided for convenience. Use of those products is subject to your agreement with MazERP.</p>
    <h2>Contact</h2>
    <p>For questions, use the <a href="<?= e(section_url('contact')) ?>">contact form</a>.</p>
    <p><a href="<?= e(route_url('')) ?>">Back to home</a></p>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
