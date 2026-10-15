<?php

declare(strict_types=1);

function product_icon(string $id): string
{
    $common = 'xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"';

    $paths = [
        'crm' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'books' => '<path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="M8 7h8"/><path d="M8 11h6"/>',
        'payroll' => '<rect width="16" height="16" x="4" y="4" rx="2"/><path d="M8 8h8"/><path d="M8 12h3"/><path d="M8 16h5"/><path d="M15 12h1"/><path d="M15 16h1"/>',
        'timex' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
    ];

    $path = $paths[$id] ?? $paths['crm'];

    return '<svg class="crm-product-icon" ' . $common . '>' . $path . '</svg>';
}
