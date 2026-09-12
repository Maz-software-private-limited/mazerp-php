<?php
/**
 * Local / Apache-less clean URL helper when serving from this directory:
 * php -S localhost:8080 router.php
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = rawurldecode($uri);
$file = __DIR__ . $path;

$mimeTypes = [
    'svg' => 'image/svg+xml',
    'css' => 'text/css',
    'js' => 'application/javascript',
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'webp' => 'image/webp',
    'xml' => 'application/xml',
    'txt' => 'text/plain',
];

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
if (isset($mimeTypes[$ext]) && is_file($file)) {
    header('Content-Type: ' . $mimeTypes[$ext]);
    readfile($file);
    return true;
}

if ($path === '/' || $path === '' || $path === '/index.php') {
    require __DIR__ . '/index.php';
    return true;
}

$slug = trim($path, '/');
if ($slug !== '' && strpos($slug, '/') === false && preg_match('/^[A-Za-z0-9\-]+$/', $slug)) {
    $php = __DIR__ . '/' . $slug . '.php';
    if (is_file($php)) {
        require $php;
        return true;
    }
    http_response_code(404);
    require __DIR__ . '/404.php';
    return true;
}

if (is_file($file)) {
    return false;
}

http_response_code(404);
require __DIR__ . '/404.php';
return true;
