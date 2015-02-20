<?php

return [
    'name'           => [
        'label'        => 'Site Name',
        'instructions' => 'What is the name of the website or application?',
        'placeholder'  => trans('distribution::addon.name')
    ],
    'description'    => [
        'label'        => 'Site Description',
        'instructions' => 'What is the description or slogan of the website or application?',
        'placeholder'  => trans('distribution::addon.description')
    ],
    'contact_email'  => [
        'label'        => 'Contact Email',
        'instructions' => 'All e-mails from users, guests and the website or application will go to this e-mail address by default.',
        'placeholder'  => 'example@domain.com'
    ],
    'server_email'   => [
        'label'        => 'Site Description',
        'instructions' => 'All emails sent from your server will come from this email address.',
        'placeholder'  => 'noreply@domain.com'
    ],
    'date_format'    => [
        'label'        => 'Date Format',
        'instructions' => 'How should dates be displayed across the website and control panel? Using the <a target="_blank" href="http://php.net/manual/en/function.date.php">date format</a> from PHP.',
        'placeholder'  => 'm/d/Y'
    ],
    'default_locale' => [
        'label'        => 'Default Language',
        'instructions' => 'What is the default language for your website or application?',
        'placeholder'  => config('app.locale')
    ],
    'site_enabled'   => [
        'label'        => 'Site Status',
        'instructions' => 'Use this option to the enable or disable the public-facing part of the website or application.<br>This is useful when you want to take the website or application down for maintenance or development.'
    ],
    'ip_whitelist'   => [
        'label'        => 'IP Whitelist',
        'instructions' => 'When the status is set to "disabled" these IP addresses will be allowed to access the website or application.',
        'placeholder'  => 'Separate each IP address with a comma.'
    ],
    'force_https'    => [
        'label'        => 'Force HTTPS',
        'instructions' => 'Allow only the HTTPS protocol when accessing the website or application?',
        'option'       => [
            'all'           => 'Force HTTPS on all connections.',
            'none'          => 'Do NOT force HTTPS connections.',
            'control_panel' => 'Only force HTTPS for control panel access.',
            'public'        => 'Only force HTTPS for public-facing content.'
        ]
    ]
];
