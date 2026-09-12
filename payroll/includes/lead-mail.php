<?php
/**
 * Payroll-only lead email builders (does not change shared suite templates).
 */
require_once __DIR__ . '/../../includes/email-templates.php';

function payroll_lead_meta(): array
{
    $tz = new DateTimeZone('Asia/Kolkata');
    $now = new DateTime('now', $tz);

    return [
        'submitted_at' => $now->format('d M Y, h:i A') . ' IST',
        'ip'           => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'source'       => 'payroll-microsite',
    ];
}

function payroll_build_lead_notification_email(array $lead): array
{
    $meta = payroll_lead_meta();
    $name = $lead['name'] ?? '';
    $email = $lead['email'] ?? '';
    $phone = $lead['phone'] ?? '';
    $company = $lead['company'] ?? '';
    $business = business_type_label($lead['business_type'] ?? '');
    $intent = (string) ($lead['intent_label'] ?? 'demo');
    $employees = trim((string) ($lead['employee_count'] ?? ''));
    $message = trim($lead['message'] ?? '');
    $messageDisplay = $message !== '' ? nl2br(escape_html($message)) : '<span style="color:#94a3b8;">—</span>';

    $emailLink = '<a href="mailto:' . escape_html($email) . '" style="color:#0d9488;text-decoration:none;">' . escape_html($email) . '</a>';
    $phoneLink = '<a href="tel:' . escape_html(preg_replace('/\s+/', '', $phone)) . '" style="color:#0d9488;text-decoration:none;">' . escape_html($phone) . '</a>';

    $fieldsTable = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e2e8f0;border-radius:8px;overflow:hidden;">'
        . email_field_row('Product', escape_html('Maz Payroll'))
        . email_field_row('Intent', escape_html($intent))
        . email_field_row('Name', escape_html($name))
        . email_field_row('Email', $emailLink)
        . email_field_row('Phone', $phoneLink)
        . email_field_row('Company', escape_html($company))
        . email_field_row('Business type', escape_html($business))
        . ($employees !== '' ? email_field_row('Employees', escape_html($employees)) : '')
        . email_field_row('Message', $messageDisplay)
        . '</table>';

    $inner = '<p style="margin:0 0 16px;font-size:16px;line-height:1.5;color:#1e293b;">A new <strong>Maz Payroll</strong> ' . escape_html($intent) . ' request was submitted.</p>'
        . $fieldsTable;

    $footer = 'Submitted via payroll-microsite &middot; '
        . escape_html($meta['submitted_at']) . ' &middot; IP ' . escape_html($meta['ip']);

    $html = email_html_wrapper('New Maz Payroll request', 'Maz Payroll', $inner, $footer);

    $messagePlain = $message !== '' ? $message : '—';
    $text = "New Maz Payroll {$intent} request\n\n"
        . "Product:       Maz Payroll\n"
        . "Intent:        {$intent}\n"
        . "Name:          {$name}\n"
        . "Email:         {$email}\n"
        . "Phone:         {$phone}\n"
        . "Company:       {$company}\n"
        . "Business type: {$business}\n"
        . ($employees !== '' ? "Employees:     {$employees}\n" : '')
        . "Message:       {$messagePlain}\n\n"
        . "Submitted: {$meta['submitted_at']}\n"
        . "Source:    payroll-microsite\n"
        . "IP:        {$meta['ip']}\n";

    return [
        'subject' => 'New Maz Payroll ' . $intent . ' request: ' . $company,
        'html'    => $html,
        'text'    => $text,
    ];
}

function payroll_build_thank_you_email(array $lead): array
{
    $firstName = lead_first_name($lead['name'] ?? '');
    $company = $lead['company'] ?? '';

    $inner = '<p style="margin:0 0 16px;font-size:17px;line-height:1.5;color:#1e293b;">Hi ' . escape_html($firstName) . ',</p>'
        . '<p style="margin:0 0 16px;font-size:15px;line-height:1.6;color:#475569;">Thank you for your interest in <strong style="color:#1e293b;">Maz Payroll</strong>. We received your request'
        . ($company !== '' ? ' for <strong style="color:#1e293b;">' . escape_html($company) . '</strong>' : '')
        . ' and our team will contact you within <strong style="color:#1e293b;">one business hour</strong>.</p>'
        . '<p style="margin:0 0 20px;font-size:15px;line-height:1.6;color:#475569;">In the meantime, you can explore Maz Payroll features on our website, or reply to this email if you have urgent questions.</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0fdfa;border-radius:8px;border:1px solid #ccfbf1;">
<tr><td style="padding:18px 20px;">
<p style="margin:0 0 10px;font-size:13px;font-weight:bold;color:#0f766e;text-transform:uppercase;letter-spacing:0.4px;">Need help now?</p>
<p style="margin:0 0 6px;font-size:14px;color:#1e293b;"><strong>Email:</strong> <a href="mailto:' . escape_html(CONTACT_EMAIL) . '" style="color:#0d9488;">' . escape_html(CONTACT_EMAIL) . '</a></p>
<p style="margin:0 0 6px;font-size:14px;color:#1e293b;"><strong>Phone:</strong> <a href="tel:' . escape_html(preg_replace('/\s+/', '', CONTACT_PHONE)) . '" style="color:#0d9488;">' . escape_html(CONTACT_PHONE) . '</a></p>
<p style="margin:0;font-size:14px;color:#1e293b;"><strong>Website:</strong> <a href="' . escape_html(PAYROLL_SITE_URL) . '/" style="color:#0d9488;">' . escape_html(PAYROLL_SITE_URL) . '</a></p>
</td></tr>
</table>';

    $footer = 'Maz Payroll &middot; ' . escape_html(SITE_TAGLINE);
    $html = email_html_wrapper('Thank you', 'Thank you', $inner, $footer);

    $text = "Hi {$firstName},\n\n"
        . "Thank you for your interest in Maz Payroll. We received your request"
        . ($company !== '' ? " for {$company}" : '')
        . " and our team will contact you within one business hour.\n\n"
        . "Need help now?\n"
        . "Email:   " . CONTACT_EMAIL . "\n"
        . "Phone:   " . CONTACT_PHONE . "\n"
        . "Website: " . PAYROLL_SITE_URL . "/\n\n"
        . "Maz Payroll — " . SITE_TAGLINE . "\n";

    return [
        'subject' => 'Thanks for contacting Maz Payroll, ' . $firstName,
        'html'    => $html,
        'text'    => $text,
    ];
}
