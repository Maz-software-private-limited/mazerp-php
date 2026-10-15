<?php

declare(strict_types=1);

/** Single CRM marketing theme — tokens live in assets/css/main.css */
function theme_registry(): array
{
    return [
        'crm' => [
            'label' => 'Pipeline Signal',
            'theme_color' => '#0b63ce',
            'fonts' => 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Outfit:wght@500;600;700;800&display=swap',
        ],
    ];
}

function active_theme_id(): string
{
    return 'crm';
}

/** @return array<string, mixed> */
function active_theme(): array
{
    return theme_registry()['crm'];
}
