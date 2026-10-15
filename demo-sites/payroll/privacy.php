<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Privacy';
$pageDescription = 'Privacy information for the MazERP Payroll marketing site.';
$pageCanonicalPath = 'privacy';
$pageJsonLd = null;

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="legal-page">
  <div class="container container--narrow">
    <h1>Privacy</h1>
    <p>This page describes how we handle information on this marketing website. Your use of the MazERP Payroll product is governed by the agreements and policies that apply to your MazERP account.</p>
    <h2>Information you provide</h2>
    <p>When you submit the demo request form, we collect the fields you enter (such as name, email, company, and message) to respond to your inquiry. Submissions may be stored in our server logs or a local submissions file until you configure email delivery.</p>
    <h2>Product sign-in</h2>
    <p>Log in and Get started links take you to MazERP-hosted applications. Those environments handle authentication and payroll data under their own policies.</p>
    <h2>Contact</h2>
    <p>Questions about this site can be sent through the <a href="<?= e(section_url('contact')) ?>">contact form</a>.</p>
    <p><a href="<?= e(route_url('')) ?>">Back to home</a></p>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
