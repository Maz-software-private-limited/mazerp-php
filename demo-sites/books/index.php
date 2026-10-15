<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require __DIR__ . '/includes/bootstrap.php';

$homeSection = isset($_GET['section']) ? (string) $_GET['section'] : '';
if ($homeSection !== '' && !in_array($homeSection, books_home_section_ids(), true)) {
    $homeSection = '';
}

$pageTitle = 'Accounting & GST software India';
$pageDescription = site_config()['meta_description'];
$pageCanonicalPath = $homeSection !== '' ? $homeSection : '';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <?php
  require __DIR__ . '/includes/sections/hero.php';
  require __DIR__ . '/includes/sections/problem.php';
  require __DIR__ . '/includes/sections/features.php';
  require __DIR__ . '/includes/sections/how-it-works.php';
  require __DIR__ . '/includes/sections/benefits.php';
  require __DIR__ . '/includes/sections/security.php';
  require __DIR__ . '/includes/sections/pricing.php';
  require __DIR__ . '/includes/sections/faq.php';
  require __DIR__ . '/includes/sections/cta-band.php';
  require __DIR__ . '/includes/sections/contact.php';
  ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
