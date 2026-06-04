<?php
/**
 * PHP built-in dev server router — fixes MIME types for static assets.
 * Without this, SVG/CSS/JS files get served as text/html and browsers reject them.
 */

$docRoot = $_SERVER['DOCUMENT_ROOT'];
$uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file    = $docRoot . $uri;

$mimeTypes = [
    'svg'   => 'image/svg+xml',
    'css'   => 'text/css',
    'js'    => 'application/javascript',
    'png'   => 'image/png',
    'jpg'   => 'image/jpeg',
    'jpeg'  => 'image/jpeg',
    'gif'   => 'image/gif',
    'ico'   => 'image/x-icon',
    'webp'  => 'image/webp',
    'woff'  => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf'   => 'font/ttf',
    'otf'   => 'font/otf',
    'map'   => 'application/json',
];

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

if (isset($mimeTypes[$ext]) && is_file($file)) {
    header('Content-Type: ' . $mimeTypes[$ext]);
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

// PHP files and directories — let the built-in server handle them normally
return false;
