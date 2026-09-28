<?php

/**
 * Per-property configuration for the shared Kuartal design system.
 * Copy this file into config/kuartal.php on each of the 5 Laravel
 * properties and edit the values for that specific site.
 */
return [

    // Shown in the nav logo and <title> fallback.
    'site_name' => env('KUARTAL_SITE_NAME', 'Kuartal'),

    // Short tag shown next to the wordmark on sites other than kuartal.id
    // (e.g. "Impact", "Capital", "Ventures", "Space"). Leave null for kuartal.id itself.
    'site_tag' => env('KUARTAL_SITE_TAG', null),

    // Primary nav shown in partials/nav.blade.php.
    // Each property overrides this list to match its own sitemap.
    'nav' => [
        ['label' => 'About',      'url' => '/about'],
        ['label' => 'Team',       'url' => '/team'],
        ['label' => 'Portfolio',  'url' => '/portfolio'],
        ['label' => 'Programmes', 'url' => '/programmes'],
        ['label' => 'Funds',      'url' => '/funds'],
        ['label' => 'Contact',    'url' => '/contact'],
    ],

    // Cross-links to the other 4 properties, shown in the footer "Kuartal Ecosystem" block.
    'ecosystem' => [
        ['label' => 'Kuartal',        'url' => 'https://kuartal.id'],
        ['label' => 'Kuartal Space',  'url' => 'https://kuartalspace.com'],
        ['label' => 'Kuartal Capital','url' => 'https://kuartalcapital.com'],
        ['label' => 'Kuartal Impact', 'url' => 'https://kuartalimpact.org'],
        ['label' => 'Kuartal Ventures','url' => 'https://kuartalventures.com'],
    ],

    'contact_email' => env('KUARTAL_CONTACT_EMAIL', 'hello@kuartal.id'),
];
