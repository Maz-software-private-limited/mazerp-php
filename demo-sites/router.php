<?php

declare(strict_types=1);

/**
 * PHP built-in server router — pretty URLs under /payroll/, /books/, /crm/, and /timex/
 *
 * php -S localhost:8089 -t "d:\workspace\Marketing_site\mazerp-marketting" router.php
 */

$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$uriPath = rawurldecode($uriPath);

$docRoot = __DIR__;
$staticFile = $docRoot . str_replace('/', DIRECTORY_SEPARATOR, $uriPath);
if ($uriPath !== '/' && is_file($staticFile)) {
    return false;
}

if ($uriPath === '/' || $uriPath === '') {
    header('Location: /timex/', true, 302);
    exit;
}

$products = [
    '/payroll' => [
        'dir' => $docRoot . '/payroll',
        'routes' => $docRoot . '/payroll/includes/url-routes.php',
        'resolve' => 'payroll_resolve_route',
    ],
    '/books' => [
        'dir' => $docRoot . '/books',
        'routes' => $docRoot . '/books/includes/url-routes.php',
        'resolve' => 'books_resolve_route',
    ],
    '/crm' => [
        'dir' => $docRoot . '/crm',
        'routes' => $docRoot . '/crm/includes/url-routes.php',
        'resolve' => 'crm_resolve_route',
    ],
    '/timex' => [
        'dir' => $docRoot . '/timex',
        'simple' => true,
    ],
];

$matchedPrefix = null;
$product = null;
foreach ($products as $prefix => $meta) {
    if ($uriPath === $prefix || str_starts_with($uriPath, $prefix . '/')) {
        $matchedPrefix = $prefix;
        $product = $meta;
        break;
    }
}

if ($matchedPrefix === null || $product === null) {
    http_response_code(404);
    echo 'Not found';
    return true;
}

$relative = trim(substr($uriPath, strlen($matchedPrefix)), '/');

if (!empty($product['simple'])) {
    chdir($product['dir']);
    if ($relative === '' || $relative === 'index.php') {
        $_SERVER['SCRIPT_NAME'] = $matchedPrefix . '/index.php';
        require $product['dir'] . '/index.php';
        return true;
    }
    if ($relative === 'demo-request') {
        $_SERVER['SCRIPT_NAME'] = $matchedPrefix . '/demo-request.php';
        require $product['dir'] . '/demo-request.php';
        return true;
    }
    http_response_code(404);
    echo 'Not found';
    return true;
}

require_once $product['routes'];
$resolveFn = $product['resolve'];
if (!function_exists($resolveFn)) {
    http_response_code(500);
    echo 'Router misconfiguration';
    return true;
}

$route = $resolveFn($relative);
if ($route === null) {
    http_response_code(404);
    echo 'Not found';
    return true;
}

$scriptPath = $product['dir'] . '/' . str_replace('/', DIRECTORY_SEPARATOR, $route['script']);
if (!is_file($scriptPath)) {
    http_response_code(404);
    echo 'Not found';
    return true;
}

if ($route['section'] !== null) {
    $_GET['section'] = $route['section'];
}

$_SERVER['SCRIPT_NAME'] = $matchedPrefix . '/' . $route['script'];
chdir($product['dir']);
require $scriptPath;

return true;
