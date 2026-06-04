<?php
/**
 * SMTP mail helper for contact form submissions.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception as MailException;
use PHPMailer\PHPMailer\PHPMailer;

function log_mail_error(string $message): void
{
    $line = date('Y-m-d H:i:s') . ' ' . $message . "\n";
    file_put_contents(__DIR__ . '/../api/mail-errors.log', $line, FILE_APPEND | LOCK_EX);
}

function is_mail_configured(): bool
{
    global $mail_config;

    return !empty($mail_config['smtp_host'])
        && !empty($mail_config['smtp_user'])
        && !empty($mail_config['smtp_pass']);
}

function get_mail_config_summary(): array
{
    global $mail_config;

    return [
        'ok'         => is_mail_configured(),
        'host'       => $mail_config['smtp_host'] ?? '',
        'port'       => (int) ($mail_config['smtp_port'] ?? 0),
        'secure'     => $mail_config['smtp_secure'] ?? '',
        'user'       => $mail_config['smtp_user'] ?? '',
        'from_email' => $mail_config['from_email'] ?? '',
    ];
}

function create_configured_mailer(): PHPMailer
{
    global $mail_config;

    if (!is_mail_configured()) {
        throw new MailException('SMTP not configured — copy includes/mail-config.local.php.example to mail-config.local.php');
    }

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host     = $mail_config['smtp_host'];
    $mail->SMTPAuth = true;
    $mail->Username = $mail_config['smtp_user'];
    $mail->Password = $mail_config['smtp_pass'];
    $mail->Port     = (int) $mail_config['smtp_port'];
    $mail->CharSet  = 'UTF-8';

    $secure = strtolower((string) ($mail_config['smtp_secure'] ?? ''));
    if ($secure === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($secure === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    }

    return $mail;
}

function get_mail_diagnostics(): array
{
    $config = get_mail_config_summary();
    $result = [
        'config'       => $config,
        'smtp_connect' => ['ok' => false],
        'overall'      => 'failed',
        'summary'      => '',
    ];

    if (!$config['ok']) {
        $result['summary'] = 'SMTP credentials are missing or incomplete.';
        log_mail_error($result['summary']);
        return $result;
    }

    try {
        $mail = create_configured_mailer();
        if ($mail->smtpConnect()) {
            $mail->smtpClose();
            $result['smtp_connect'] = ['ok' => true];
            $result['overall']      = 'ok';
            $result['summary']      = 'SMTP connection and authentication succeeded.';
        } else {
            $error = $mail->ErrorInfo ?: 'SMTP connect() failed.';
            $result['smtp_connect'] = ['ok' => false, 'error' => $error];
            $result['summary']      = $error;
            log_mail_error('SMTP connectivity test failed: ' . $error);
        }
    } catch (MailException $e) {
        $error = $e->getMessage();
        $result['smtp_connect'] = ['ok' => false, 'error' => $error];
        $result['summary']      = $error;
        log_mail_error('SMTP connectivity test failed: ' . $error);
    }

    return $result;
}

function send_test_email(): array
{
    global $mail_config;

    $hostname = gethostname() ?: 'unknown';

    try {
        $mail = create_configured_mailer();
        $mail->setFrom($mail_config['from_email'], $mail_config['from_name']);
        $mail->addAddress(CONTACT_EMAIL);
        $mail->Subject = 'MazERP SMTP test';
        $mail->Body    = "This is a test email from MazERP.\n\n"
            . 'Time: ' . date('Y-m-d H:i:s') . "\n"
            . 'Server: ' . $hostname . "\n";
        $mail->isHTML(false);
        $mail->send();

        return ['sent' => true, 'to' => CONTACT_EMAIL];
    } catch (MailException $e) {
        $error = isset($mail) ? ($mail->ErrorInfo ?: $e->getMessage()) : $e->getMessage();
        log_mail_error('Test email failed: ' . $error);

        return ['sent' => false, 'to' => CONTACT_EMAIL, 'error' => $error];
    }
}

function send_contact_email(string $subject, string $body, string $replyToEmail, string $replyToName): bool
{
    if (!is_mail_configured()) {
        log_mail_error('SMTP not configured — copy includes/mail-config.local.php.example to mail-config.local.php');
        return false;
    }

    try {
        $mail = create_configured_mailer();
        global $mail_config;

        $mail->setFrom($mail_config['from_email'], $mail_config['from_name']);
        $mail->addAddress(CONTACT_EMAIL);
        $mail->addReplyTo($replyToEmail, $replyToName);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->isHTML(false);
        $mail->send();

        return true;
    } catch (MailException $e) {
        $error = isset($mail) ? ($mail->ErrorInfo ?: $e->getMessage()) : $e->getMessage();
        log_mail_error($error);
        return false;
    }
}
