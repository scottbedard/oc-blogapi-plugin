<?php
return [
    'plugin' => [
        'description' => 'A simple HTTP API for RainLab.Blog.',
        'name' => 'Blog API',
        'permission_manage' => 'Manage blog API',
    ],

    'settings' => [
        'cache' => 'Cache',
        'cache_comment' => 'Minutes to cache results for (leave blank to disable caching).',
        'description' => 'Enable or disable the blog API.',
        'is_enabled_comment' => 'When switched off, no blog endpoints will be available.',
        'is_enabled' => 'API endpoints',
        'label' => 'Settings',
    ],
];
