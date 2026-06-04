<?php
/**
 * HTML and plain-text email templates for contact form flows.
 */

function escape_html(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function business_type_label(string $code): string
{
    $labels = [
        'retail'      => 'Retail Store',
        'restaurant'  => 'Restaurant',
        'supermarket' => 'Supermarket',
        'pharmacy'    => 'Pharmacy',
        'hardware'    => 'Hardware Shop',
        'other'       => 'Other',
    ];

    return $labels[$code] ?? $code;
}

function lead_first_name(string $name): string
{
    $parts = preg_split('/\s+/', trim($name), 2);

    return $parts[0] !== '' ? $parts[0] : $name;
}

function lead_submitted_meta(): array
{
    $tz = new DateTimeZone('Asia/Kolkata');
    $now = new DateTime('now', $tz);

    return [
        'submitted_at' => $now->format('d M Y, h:i A') . ' IST',
        'ip'           => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'source'       => 'contact form',
    ];
}

function email_logo_available(): bool
{
    return is_file(EMAIL_LOGO_PATH);
}

function email_header_brand_html(): string
{
    if (email_logo_available()) {
        $alt = escape_html(SITE_NAME);

        return '<img src="cid:' . escape_html(EMAIL_LOGO_CID) . '" alt="' . $alt . '" width="118" height="40" style="height:40px;width:auto;max-width:118px;display:block;border:0;">';
    }

    return '<span style="font-size:22px;font-weight:bold;color:#ffffff;letter-spacing:0.3px;">' . escape_html(SITE_NAME) . '</span>';
}

function email_html_wrapper(string $title, string $badge, string $innerHtml, string $footerHtml = ''): string
{
    $brandHtml = email_header_brand_html();
    $titleEsc = escape_html($title);
    $badgeEsc = escape_html($badge);

    return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>' . $titleEsc . '</title>
</head>
<body style="margin:0;padding:0;background-color:#f8fafc;font-family:Arial,Helvetica,sans-serif;color:#1e293b;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8fafc;padding:24px 12px;">
<tr><td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e2e8f0;">
<tr>
<td style="background-color:#020617;padding:20px 28px;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td style="vertical-align:middle;">' . $brandHtml . '</td>
<td align="right" style="font-size:11px;font-weight:bold;color:#ffffff;background-color:#2563eb;padding:6px 12px;border-radius:999px;text-transform:uppercase;letter-spacing:0.5px;">' . $badgeEsc . '</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="padding:28px;">' . $innerHtml . '</td>
</tr>
' . ($footerHtml !== '' ? '<tr><td style="padding:16px 28px 24px;border-top:1px solid #e2e8f0;background-color:#f8fafc;font-size:12px;color:#475569;line-height:1.5;">' . $footerHtml . '</td></tr>' : '') . '
</table>
</td></tr>
</table>
</body>
</html>';
}

function email_field_row(string $label, string $valueHtml): string
{
    return '<tr>
<td style="padding:10px 12px;font-size:12px;font-weight:bold;color:#475569;text-transform:uppercase;letter-spacing:0.4px;width:140px;vertical-align:top;border-bottom:1px solid #f1f5f9;">' . escape_html($label) . '</td>
<td style="padding:10px 12px;font-size:15px;color:#1e293b;vertical-align:top;border-bottom:1px solid #f1f5f9;">' . $valueHtml . '</td>
</tr>';
}

function build_lead_notification_email(array $lead): array
{
    $meta = lead_submitted_meta();
    $name = $lead['name'] ?? '';
    $email = $lead['email'] ?? '';
    $phone = $lead['phone'] ?? '';
    $company = $lead['company'] ?? '';
    $business = business_type_label($lead['business_type'] ?? '');
    $message = trim($lead['message'] ?? '');
    $messageDisplay = $message !== '' ? nl2br(escape_html($message)) : '<span style="color:#94a3b8;">—</span>';

    $emailLink = '<a href="mailto:' . escape_html($email) . '" style="color:#2563eb;text-decoration:none;">' . escape_html($email) . '</a>';
    $phoneLink = '<a href="tel:' . escape_html(preg_replace('/\s+/', '', $phone)) . '" style="color:#2563eb;text-decoration:none;">' . escape_html($phone) . '</a>';

    $fieldsTable = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e2e8f0;border-radius:8px;overflow:hidden;">'
        . email_field_row('Name', escape_html($name))
        . email_field_row('Email', $emailLink)
        . email_field_row('Phone', $phoneLink)
        . email_field_row('Company', escape_html($company))
        . email_field_row('Business type', escape_html($business))
        . email_field_row('Message', $messageDisplay)
        . '</table>';

    $inner = '<p style="margin:0 0 16px;font-size:16px;line-height:1.5;color:#1e293b;">A new demo request was submitted on the website.</p>'
        . $fieldsTable;

    $footer = 'Submitted via ' . escape_html($meta['source']) . ' &middot; '
        . escape_html($meta['submitted_at']) . ' &middot; IP ' . escape_html($meta['ip']);

    $html = email_html_wrapper('New demo request', 'New demo request', $inner, $footer);

    $messagePlain = $message !== '' ? $message : '—';
    $text = "New MazERP Demo / Trial Request\n\n"
        . "Name:          {$name}\n"
        . "Email:         {$email}\n"
        . "Phone:         {$phone}\n"
        . "Company:       {$company}\n"
        . "Business type: {$business}\n"
        . "Message:       {$messagePlain}\n\n"
        . "Submitted: {$meta['submitted_at']}\n"
        . "Source:    {$meta['source']}\n"
        . "IP:        {$meta['ip']}\n";

    return [
        'subject' => 'New demo request: ' . $company,
        'html'    => $html,
        'text'    => $text,
    ];
}

function build_thank_you_email(array $lead): array
{
    $firstName = lead_first_name($lead['name'] ?? '');
    $company = $lead['company'] ?? '';

    $inner = '<p style="margin:0 0 16px;font-size:17px;line-height:1.5;color:#1e293b;">Hi ' . escape_html($firstName) . ',</p>'
        . '<p style="margin:0 0 16px;font-size:15px;line-height:1.6;color:#475569;">Thank you for reaching out to <strong style="color:#1e293b;">' . escape_html(SITE_NAME) . '</strong>. We received your demo request'
        . ($company !== '' ? ' for <strong style="color:#1e293b;">' . escape_html($company) . '</strong>' : '')
        . ' and our team will contact you within <strong style="color:#1e293b;">one business hour</strong>.</p>'
        . '<p style="margin:0 0 20px;font-size:15px;line-height:1.6;color:#475569;">In the meantime, explore our features and solutions on our website, or reply to this email if you have urgent questions.</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#eff6ff;border-radius:8px;border:1px solid #dbeafe;">
<tr><td style="padding:18px 20px;">
<p style="margin:0 0 10px;font-size:13px;font-weight:bold;color:#1d4ed8;text-transform:uppercase;letter-spacing:0.4px;">Need help now?</p>
<p style="margin:0 0 6px;font-size:14px;color:#1e293b;"><strong>Email:</strong> <a href="mailto:' . escape_html(CONTACT_EMAIL) . '" style="color:#2563eb;">' . escape_html(CONTACT_EMAIL) . '</a></p>
<p style="margin:0 0 6px;font-size:14px;color:#1e293b;"><strong>Phone:</strong> <a href="tel:' . escape_html(preg_replace('/\s+/', '', CONTACT_PHONE)) . '" style="color:#2563eb;">' . escape_html(CONTACT_PHONE) . '</a></p>
<p style="margin:0;font-size:14px;color:#1e293b;"><strong>Website:</strong> <a href="' . escape_html(SITE_URL) . '" style="color:#2563eb;">' . escape_html(SITE_URL) . '</a></p>
</td></tr>
</table>';

    $footer = escape_html(SITE_NAME) . ' &middot; ' . escape_html(SITE_TAGLINE);

    $html = email_html_wrapper('Thank you', 'Thank you', $inner, $footer);

    $text = "Hi {$firstName},\n\n"
        . "Thank you for contacting " . SITE_NAME . ". We received your demo request"
        . ($company !== '' ? " for {$company}" : '')
        . " and our team will contact you within one business hour.\n\n"
        . "Need help now?\n"
        . "Email:   " . CONTACT_EMAIL . "\n"
        . "Phone:   " . CONTACT_PHONE . "\n"
        . "Website: " . SITE_URL . "\n\n"
        . SITE_NAME . " — " . SITE_TAGLINE . "\n";

    return [
        'subject' => 'Thanks for contacting MazERP, ' . $firstName,
        'html'    => $html,
        'text'    => $text,
    ];
}
