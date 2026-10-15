<?php

declare(strict_types=1);

session_start();

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed.']);
    exit;
}

require __DIR__ . '/includes/bootstrap.php';

$token = $_POST['csrf_token'] ?? '';
if (!is_string($token) || $token === '' || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'Session expired. Refresh the page and try again.']);
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$company = trim((string) ($_POST['company'] ?? ''));
$employees = trim((string) ($_POST['employees'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

$errors = [];
if ($name === '') {
    $errors[] = 'Name is required.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid work email is required.';
}

if ($errors !== []) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$payload = [
    'submitted_at' => gmdate('c'),
    'name' => $name,
    'email' => $email,
    'company' => $company,
    'employees' => $employees,
    'message' => $message,
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

$storageDir = __DIR__ . '/storage';
if (!is_dir($storageDir) && !mkdir($storageDir, 0755, true) && !is_dir($storageDir)) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Could not save your request. Try again later.']);
    exit;
}

$file = $storageDir . '/demo-requests.jsonl';
$line = json_encode($payload, JSON_UNESCAPED_UNICODE) . "\n";
if (file_put_contents($file, $line, FILE_APPEND | LOCK_EX) === false) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Could not save your request. Try again later.']);
    exit;
}

$contactEmail = site_config()['contact_email'];
if ($contactEmail !== '') {
    $subject = 'Payroll demo request from ' . $name;
    $body = "Name: {$name}\nEmail: {$email}\nCompany: {$company}\nEmployees: {$employees}\n\n{$message}";
    $headers = 'From: noreply@mazerp.local' . "\r\n" . 'Reply-To: ' . $email;
    @mail($contactEmail, $subject, $body, $headers);
}

echo json_encode([
    'ok' => true,
    'message' => 'Thanks—your walkthrough request is in. We will reply with next steps.',
]);
