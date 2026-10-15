<?php

declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: text/plain; charset=utf-8');

$sitemap = absolute_url('sitemap.php');
echo "User-agent: *\nAllow: /\n\nSitemap: {$sitemap}\n";
