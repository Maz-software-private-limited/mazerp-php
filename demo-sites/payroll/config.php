<?php

declare(strict_types=1);

/**
 * Site configuration — override via environment variables in deployment.
 */
return [
    /** URL segment when hosted as https://example.com/payroll/ — set MAZERP_BASE_PATH= to disable */
    'base_path' => 'demo-sites/payroll',
    /** Visual theme: payroll | payroll_2 | payroll_3 | payroll_4 | payroll_5 (override with MAZERP_THEME) */
    'default_theme' => 'payroll',
    'site_name' => 'MazERP Payroll',
    'logo' => 'assets/img/maz-payroll-logo.jpg',
    'tagline' => 'Monthly payroll from salary setup to payslip',
    'meta_description' => 'Payroll software India for monthly runs: salary structures, PF, ESI, TDS, attendance, leave, and payslips in one MazERP workflow. Book a walkthrough or open the app.',
    'seo' => [
        'site_url' => rtrim(getenv('MAZERP_SITE_URL') ?: '', '/'),
        'primary_keyword' => 'payroll software India',
        'secondary_keywords' => [
            'monthly payroll',
            'PF ESI TDS payroll',
            'payslip software',
            'payroll processing India',
            'LOP payroll',
        ],
        'og_image' => 'assets/img/maz-payroll-logo.jpg',
        'twitter_card' => 'summary_large_image',
    ],
    'console_url' => rtrim(getenv('MAZERP_CONSOLE_URL') ?: 'http://localhost:4210/console', '/'),
    'payroll_app_url' => rtrim(getenv('MAZERP_PAYROLL_URL') ?: 'http://localhost:4214/payroll', '/'),
    /** Main MazERP marketing site (Products menu links), same as mazerp.com */
    'mazerp_marketing_url' => rtrim(getenv('MAZERP_MARKETING_URL') ?: getenv('MAZERP_ALL_PRODUCTS_URL') ?: 'https://www.mazerp.com', '/'),
    'company_name' => 'MazERP',
    'contact_email' => getenv('MAZERP_CONTACT_EMAIL') ?: 'info@maztechno.com',
    'contact_phone' => getenv('MAZERP_CONTACT_PHONE') ?: '+91 81100 87700',
    /** Digits only, with country code — used for wa.me / tel links */
    'contact_phone_e164' => getenv('MAZERP_CONTACT_PHONE_E164') ?: '918110087700',
    'contact_whatsapp_e164' => getenv('MAZERP_CONTACT_WHATSAPP_E164') ?: '918110087700',
    'contact_whatsapp_prefill' => 'Hi, I would like to know more about MazERP Payroll.',
    'social_facebook' => getenv('MAZERP_SOCIAL_FACEBOOK') ?: 'https://www.facebook.com/600389126485243',
    'social_instagram' => getenv('MAZERP_SOCIAL_INSTAGRAM') ?: 'https://www.instagram.com/mazsoftwaresolutions/',
    /** X (Twitter) — set MAZERP_SOCIAL_TWITTER if your handle differs */
    'social_twitter' => getenv('MAZERP_SOCIAL_TWITTER') ?: 'https://x.com/mazsoftwaresolutions',
    'social_linkedin' => getenv('MAZERP_SOCIAL_LINKEDIN') ?: 'https://www.linkedin.com/company/maz-software-solutions',
    'pricing' => [
        'billing_modes' => ['monthly', 'yearly'],
        'default_mode' => 'yearly',
        'currency' => 'INR',
        /** Single plan — edit amounts here or via env (see README). */
        'plan' => [
            'name' => 'MazERP Payroll',
            'description' => 'One simple plan for monthly payroll—statutory components, attendance, leave, and payslips.',
            'monthly_price' => (int) (getenv('MAZERP_PRICE_MONTHLY') ?: 999),
            'included_employees' => (int) (getenv('MAZERP_INCLUDED_EMPLOYEES') ?: 10),
            'addon_employee_monthly' => (int) (getenv('MAZERP_PRICE_ADDON_EMPLOYEE') ?: 99),
            'yearly_price' => (int) (getenv('MAZERP_PRICE_YEARLY') ?: 0),
            'employee_limit' => '10 employees included — add more anytime',
            'features' => [
                'Monthly payroll processing and registers',
                'Salary structures, attendance, leave & LOP',
                'PF, ESI, and TDS in your workflow',
                'Payslips after payroll approval',
                'Overtime and payroll approval workflow',
            ],
            'cta' => 'Open payroll app',
            'offers' => [],
            'intro_note' => 'Add-on employee packs are purchased in the payroll app when you need more than the included seats.',
        ],
    ],
    'faq' => [
        [
            'question' => 'Is MazERP Payroll only for companies in India?',
            'answer' => 'It is built around monthly payroll workflows Indian businesses use—including PF, ESI, TDS, attendance, and LOP. If that matches how you pay people, it is likely a fit.',
        ],
        [
            'question' => 'Do I need to set up PF, ESI, and TDS myself?',
            'answer' => 'You configure statutory components as part of salary structures and payroll runs. What applies depends on your organization settings and regulations for your business.',
        ],
        [
            'question' => 'What happens when someone takes unpaid leave?',
            'answer' => 'Approved leave and loss of pay (LOP) for the period feed into the monthly run so net pay reflects the days you actually paid for.',
        ],
        [
            'question' => 'When do employees receive payslips?',
            'answer' => 'After you process and approve payroll for the period, you can generate payslips based on your setup and who has access in the product.',
        ],
        [
            'question' => 'I already have a MazERP account. Where do I start?',
            'answer' => 'Use Log in to open payroll with your existing account. New to MazERP? Open the payroll app to begin setup, or book a walkthrough and we will walk through your scenario.',
        ],
        [
            'question' => 'Where is payroll data stored?',
            'answer' => 'Data lives in the MazERP environment you sign in to. Ask us for hosting, access, and retention details for your deployment.',
        ],
    ],
];
