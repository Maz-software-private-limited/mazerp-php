<?php

declare(strict_types=1);

require dirname(__DIR__) . '/includes/bootstrap.php';

header('Location: ' . route_url(''), true, 302);
exit;
