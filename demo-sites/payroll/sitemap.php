<?php

declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

header('Content-Type: application/xml; charset=utf-8');

$root = __DIR__;
$urls = [
    ['path' => '', 'file' => $root . '/index.php', 'priority' => '1.0'],
    ['path' => 'privacy.php', 'file' => $root . '/privacy.php', 'priority' => '0.3'],
    ['path' => 'terms.php', 'file' => $root . '/terms.php', 'priority' => '0.3'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url):
    $loc = $url['path'] === '' ? absolute_url('') : absolute_url($url['path']);
    $lastmod = date('Y-m-d', filemtime($url['file']));
?>
  <url>
    <loc><?= htmlspecialchars($loc, ENT_XML1) ?></loc>
    <lastmod><?= htmlspecialchars($lastmod, ENT_XML1) ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority><?= htmlspecialchars($url['priority'], ENT_XML1) ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
