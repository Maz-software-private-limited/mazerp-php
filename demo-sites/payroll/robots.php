<?php

declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: text/plain; charset=utf-8');

$sitemap = absolute_url('sitemap.php');
if (str_starts_with($sitemap, '/')) {
    $sitemap = site_url() !== '' ? site_url() . '/sitemap.php' : '/sitemap.php';
}

echo "User-agent: *\n";
echo "Allow: /\n";
echo "Disallow: /storage/\n";
echo "\n";
echo "Sitemap: {$sitemap}\n";
