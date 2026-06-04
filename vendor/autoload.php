<?php
/**
 * Minimal PSR-4 autoloader for PHPMailer (used when composer install is not run locally).
 */
spl_autoload_register(function ($class) {
    $prefix = 'PHPMailer\\PHPMailer\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }
    $file = __DIR__ . '/phpmailer/phpmailer/src/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    if (is_file($file)) {
        require $file;
    }
});
