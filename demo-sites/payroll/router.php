<?php

declare(strict_types=1);

/**
 * PHP built-in server router when document root is the payroll folder:
 *
 *   cd payroll && php -S localhost:8000 router.php
 *
 * Then open http://localhost:8000/pricing (not /payroll/pricing).
 */

$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$uriPath = rawurldecode($uriPath);

$docRoot = __DIR__;
$staticFile = $docRoot . str_replace('/', DIRECTORY_SEPARATOR, $uriPath);
if ($uriPath !== '/' && is_file($staticFile)) {
    return false;
}

$relative = trim($uriPath, '/');

require_once __DIR__ . '/includes/url-routes.php';

$route = payroll_resolve_route($relative);
if ($route === null) {
    http_response_code(404);
    echo 'Not found';
    return true;
}

$scriptPath = $docRoot . '/' . str_replace('/', DIRECTORY_SEPARATOR, $route['script']);
if (!is_file($scriptPath)) {
    http_response_code(404);
    echo 'Not found';
    return true;
}

if ($route['section'] !== null) {
    $_GET['section'] = $route['section'];
}

$_SERVER['SCRIPT_NAME'] = '/' . $route['script'];
chdir($docRoot);
require $scriptPath;

return true;
