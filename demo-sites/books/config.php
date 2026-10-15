<?php

declare(strict_types=1);

/**
 * Site configuration — override via environment variables in deployment.
 */
return [
    /** URL segment when hosted as https://example.com/books/ — set MAZERP_BASE_PATH= to disable */
    'base_path' => 'books',
    /** Visual theme: books | books_2 | books_3 | books_4 | books_5 (override with MAZERP_THEME) */
    'default_theme' => 'books',
    'site_name' => 'MazERP Books',
    'tagline' => 'Accounting and GST from invoice to balance sheet',
    'meta_description' => 'Books and accounting software for Indian businesses: sales, purchases, inventory, banking, GST returns, e-invoice, and financial reports in one MazERP workflow. Request a walkthrough or open the app.',
    'seo' => [
        'site_url' => rtrim(getenv('MAZERP_SITE_URL') ?: '', '/'),
        'primary_keyword' => 'accounting software India',
        'secondary_keywords' => [
            'GST billing software',
            'inventory accounting',
            'e-invoice software',
            'GSTR filing',
            'small business accounting',
        ],
        'og_image' => 'assets/img/logo.png',
        'twitter_card' => 'summary_large_image',
    ],
    'console_url' => rtrim(getenv('MAZERP_CONSOLE_URL') ?: 'https://app.mazerp.com/console', '/'),
    'books_app_url' => rtrim(getenv('MAZERP_BOOKS_URL') ?: 'http://localhost:4211/books', '/'),
    'company_name' => 'MazERP',
    'contact_email' => getenv('MAZERP_CONTACT_EMAIL') ?: '',
    'pricing' => [
        'default_mode' => 'yearly',
        'currency' => 'INR',
        /** Live catalog from MazERP console API (GET {base}/{product}/plans). */
        'api' => [
            'enabled' => true,
            'base_url' => 'https://api.mazerp.com/console',
            'product_code' => 'books',
            'query' => ['status' => 'active'],
            'connect_timeout' => 5,
            'timeout' => 15,
            'cache_ttl' => 300,
            'use_stale_on_error' => true,
        ],
        'hero_title' => 'Simple, transparent pricing for your business',
        'hero_lead' => 'MazERP Books brings invoicing, inventory, banking, and GST work onto one ledger. Plans and prices below are loaded from MazERP—pick monthly or yearly billing, then continue in console when you are ready.',
        'console_note' => '',
        /** Used only when MAZERP_BOOKS_LIVE_PRICING=0 (offline / fallback). */
        'plans' => [],
        'comparison' => [
            'enabled' => false,
            'rows' => [],
        ],
        'pricing_faq' => [
            [
                'question' => 'Where do I see official plan names and prices?',
                'answer' => 'Open View plans & pricing to see the current Books catalog in MazERP console, including monthly and yearly options and what each plan includes.',
            ],
            [
                'question' => 'Can I choose monthly or yearly billing?',
                'answer' => 'Yes. The console pricing page lets you switch billing cycles before you add a plan to your cart and continue to checkout.',
            ],
            [
                'question' => 'What happens after I pick a plan?',
                'answer' => 'You sign in with your MazERP account, review add-ons if applicable, and complete checkout in console. New organizations can then finish Books setup and open the app.',
            ],
            [
                'question' => 'Do add-ons apply to Books?',
                'answer' => 'Optional add-ons available for your subscription are shown in console during the purchase flow. Open the Books add-ons page from console when you are already a customer.',
            ],
            [
                'question' => 'I already subscribe to MazERP. How do I change plans?',
                'answer' => 'Use Log in and open Books pricing or your subscription area in console to renew or upgrade according to what your account allows.',
            ],
        ],
    ],
    'faq' => [
        [
            'question' => 'Is MazERP Books built for businesses in India?',
            'answer' => 'It follows workflows Indian teams use daily—GST-aligned documents, returns workspaces, inventory with tax lines, and reports such as profit and loss and balance sheet. If that matches how you operate, it is likely a fit.',
        ],
        [
            'question' => 'Can I manage sales and purchases in the same place as inventory?',
            'answer' => 'Yes. Invoices, bills, orders, and stock movements share the same item and party records so quantities and values stay tied to the documents that created them.',
        ],
        [
            'question' => 'Does Books include GST return preparation?',
            'answer' => 'The product includes GST filing views and summaries (for example GSTR-1, GSTR-2, and GSTR-3B) built from your transactions. What you file still depends on your registrations and the returns you are required to submit.',
        ],
        [
            'question' => 'How do e-invoice and e-way bill work?',
            'answer' => 'When your organization enables the relevant settings, you can generate IRNs and e-way bills from documents inside Books. Availability depends on your credentials and configuration in the app.',
        ],
        [
            'question' => 'I already have a MazERP account. Where do I start?',
            'answer' => 'Use Log in to open Books with your existing account. New to MazERP? Open the Books app to begin setup, or request a walkthrough and we will walk through your scenario.',
        ],
        [
            'question' => 'Where is my accounting data stored?',
            'answer' => 'Data lives in the MazERP environment you sign in to. Ask us for hosting, access, and retention details for your deployment.',
        ],
    ],
];
