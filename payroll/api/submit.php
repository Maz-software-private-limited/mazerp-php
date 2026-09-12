<?php
/**
 * Payroll microsite demo/contact submit endpoint.
 * Keeps product labeling local to /payroll — does not change shared api/submit.php.
 */
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../../includes/mail.php';
require_once __DIR__ . '/../includes/lead-mail.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you. We will be in touch shortly.']);
    exit;
}

function payroll_clean($v) {
    return trim(strip_tags((string) $v));
}

$name = payroll_clean($_POST['name'] ?? '');
$email = payroll_clean($_POST['email'] ?? '');
$phone = payroll_clean($_POST['phone'] ?? '');
$company = payroll_clean($_POST['company'] ?? '');
$business = payroll_clean($_POST['business_type'] ?? '');
$message = payroll_clean($_POST['message'] ?? '');
$employeeCount = payroll_clean($_POST['employee_count'] ?? '');
$intentRaw = strtolower(payroll_clean($_POST['intent'] ?? 'demo'));
$intent = in_array($intentRaw, ['demo', 'contact', 'trial'], true) ? $intentRaw : 'demo';

$errors = [];
if (strlen($name) < 2) {
    $errors[] = 'Valid name required.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Valid email required.';
}
if (!preg_match('/^[+\d\s\-()]{8,}$/', $phone)) {
    $errors[] = 'Valid phone required.';
}
if ($company === '') {
    $errors[] = 'Company name required.';
}
if ($business === '') {
    $errors[] = 'Business type required.';
}
if ($employeeCount === '') {
    $errors[] = 'Employee count required.';
}

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$lead = [
    'name'           => $name,
    'email'          => $email,
    'phone'          => $phone,
    'company'        => $company,
    'business_type'  => $business,
    'message'        => $message,
    'employee_count' => $employeeCount,
    'intent_label'   => $intent,
];

$meta = payroll_lead_meta();
$logBody = "New Maz Payroll {$intent} request\n\n";
$logBody .= "Product:  Maz Payroll\n";
$logBody .= "Intent:   {$intent}\n";
$logBody .= "Name:     {$name}\nEmail:    {$email}\nPhone:    {$phone}\n";
$logBody .= "Company:  {$company}\nType:     " . payroll_business_type_label($business) . "\n";
if ($employeeCount !== '') {
    $logBody .= "Employees: {$employeeCount}\n";
}
$logBody .= 'Message:  ' . ($message !== '' ? $message : '—') . "\n";
$logBody .= "\nSubmitted: {$meta['submitted_at']}\nSource: payroll-microsite\nIP: {$meta['ip']}\n";

$logFile = __DIR__ . '/leads.log';
$logWritten = file_put_contents($logFile, $logBody . "\n---\n", FILE_APPEND | LOCK_EX);

$mailSent = false;
if (is_mail_configured()) {
    $notification = payroll_build_lead_notification_email($lead);
    $mailSent = send_contact_email(
        $notification['subject'],
        $notification['html'],
        $notification['text'],
        $email,
        $name
    );

    $thankYou = payroll_build_thank_you_email($lead);
    send_thank_you_email(
        $thankYou['subject'],
        $thankYou['html'],
        $thankYou['text'],
        $email,
        $name
    );
}

if ($mailSent || $logWritten !== false) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Our team will contact you within one business hour.']);
    exit;
}

http_response_code(500);
echo json_encode(['success' => false, 'message' => 'Could not submit your request. Please call us directly.']);
