<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mail.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

$configuredKey = (string) ($mail_config['test_mail_key'] ?? '');
if ($configuredKey === '') {
    http_response_code(503);
    echo json_encode(['success' => false, 'message' => 'test_mail_key not configured']);
    exit;
}

$providedKey = (string) ($_GET['key'] ?? '');
if ($providedKey === '' || !hash_equals($configuredKey, $providedKey)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Forbidden']);
    exit;
}

$connectivity = get_mail_diagnostics();
$response = [
    'success'      => $connectivity['overall'] === 'ok',
    'connectivity' => $connectivity,
];

if (isset($_GET['send']) && $_GET['send'] === '1') {
    if ($connectivity['overall'] !== 'ok') {
        $response['test_email'] = [
            'sent'  => false,
            'to'    => CONTACT_EMAIL,
            'error' => 'Skipped — SMTP connectivity check failed.',
        ];
        $response['success'] = false;
    } else {
        $response['test_email'] = send_test_email();
        $response['success']    = $response['test_email']['sent'];
    }
}

echo json_encode($response, JSON_PRETTY_PRINT);
