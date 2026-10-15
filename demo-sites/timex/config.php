<?php

declare(strict_types=1);

return [
    'base_path' => 'timex',
    'site_name' => 'MazERP Timex',
    'logo' => 'assets/img/logo.png',
    'tagline' => 'Time and Attendance Management App',
    'meta_description' => 'MazERP Timex — smart attendance for the modern workforce. Live board, biometric punch, leave, shifts, and HRM reports by Maz Techno.',
    'console_url' => rtrim(getenv('MAZERP_CONSOLE_URL') ?: 'http://localhost:4210/console', '/'),
    'timex_app_url' => rtrim(getenv('MAZERP_TIMEX_URL') ?: 'http://localhost:4213/timex', '/'),
    'mazerp_marketing_url' => rtrim(getenv('MAZERP_MARKETING_URL') ?: getenv('MAZERP_ALL_PRODUCTS_URL') ?: 'https://www.mazerp.com', '/'),
    'company_name' => 'Maz Techno',
    'contact_email' => getenv('MAZERP_CONTACT_EMAIL') ?: 'info@maztechno.com',
    'contact_phone' => getenv('MAZERP_CONTACT_PHONE') ?: '+91 94440 12345',
    'contact_phone_e164' => getenv('MAZERP_CONTACT_PHONE_E164') ?: '919444012345',
    'contact_whatsapp_e164' => getenv('MAZERP_CONTACT_WHATSAPP_E164') ?: '919444012345',
    'contact_whatsapp_prefill' => 'Hi, I would like to schedule a MazERP Timex demo.',
    'pricing' => [
        'monthly_price' => (int) (getenv('MAZERP_TIMEX_PRICE_MONTHLY') ?: 999),
        'intro' => 'First year free for qualifying new organizations. ₹999/month after year one.',
    ],
];
