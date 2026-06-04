<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mail.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// Honeypot
if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you. We will be in touch shortly.']);
    exit;
}

function clean($v) { return trim(strip_tags((string)$v)); }

$name     = clean($_POST['name'] ?? '');
$email    = clean($_POST['email'] ?? '');
$phone    = clean($_POST['phone'] ?? '');
$company  = clean($_POST['company'] ?? '');
$business = clean($_POST['business_type'] ?? '');
$message  = clean($_POST['message'] ?? '');

$errors = [];
if (strlen($name) < 2)                          $errors[] = 'Valid name required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))  $errors[] = 'Valid email required.';
if (!preg_match('/^[+\d\s\-()]{8,}$/', $phone)) $errors[] = 'Valid phone required.';
if ($company === '')                             $errors[] = 'Company name required.';
if ($business === '')                            $errors[] = 'Business type required.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$body  = "New MazERP Demo / Trial Request\n\n";
$body .= "Name:     {$name}\nEmail:    {$email}\nPhone:    {$phone}\n";
$body .= "Company:  {$company}\nType:     {$business}\nMessage:  {$message}\n";
$body .= "\nSubmitted: " . date('Y-m-d H:i:s') . "\nIP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

$logWritten = file_put_contents(__DIR__ . '/leads.log', $body . "\n---\n", FILE_APPEND | LOCK_EX);
$mailSent   = send_contact_email("New inquiry: {$company}", $body, $email, $name);

if ($mailSent || $logWritten !== false) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Our team will contact you within one business hour.']);
    exit;
}

http_response_code(500);
echo json_encode(['success' => false, 'message' => 'Could not submit your request. Please call us directly.']);
