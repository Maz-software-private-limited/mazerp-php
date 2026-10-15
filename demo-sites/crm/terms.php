<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Terms';
$pageDescription = 'Terms of use for the Maz CRM marketing site.';
$pageCanonicalPath = 'terms';
$pageJsonLd = null;

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="crm-legal">
  <div class="crm-wrap crm-wrap--narrow">
    <h1>Terms</h1>
    <p>This marketing site is provided for information about Maz CRM. Access to the product itself is subject to your MazERP subscription and applicable agreements.</p>
    <h2>Use of this site</h2>
    <p>Content here may change as the product evolves. Pricing shown is configurable and may not match your final quote.</p>
    <h2>Contact</h2>
    <p>Questions about this site can be sent through the <a href="<?= e(section_url('contact')) ?>">contact form</a>.</p>
    <p><a href="<?= e(route_url('')) ?>">Back to home</a></p>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
