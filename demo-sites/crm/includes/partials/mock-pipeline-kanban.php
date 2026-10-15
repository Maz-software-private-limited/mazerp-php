<?php

declare(strict_types=1);

$shellActive = 'deals';
$shellPath = 'app.mazerp.com/crm/deals';
$shellCompact = !empty($mockCompact);
$shellFullWidth = true;

require __DIR__ . '/mock-app-shell-open.php';
require __DIR__ . '/mock-crm-deals-board.php';
require __DIR__ . '/mock-app-shell-close.php';
