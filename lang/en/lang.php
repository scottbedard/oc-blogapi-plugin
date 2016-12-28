<?php
return [
    'plugin' => [
        'description' => 'A simple HTTP API for RainLab.Blog.',
        'name' => 'Blog API',
        'permission_manage' => 'Manage blog API',
    ],

    'settings' => [
        'cache_categories_comment' => 'Minutes to cache a list of categories for.',
        'cache_categories' => 'Categories cache',
        'cache_category_comment' => 'Minutes to cache an individual category for.',
        'cache_category' => 'Category cache',
        'cache_placeholder' => 'Leave blank to disable caching',
        'cache_post_comment' => 'Minutes to cache an individual post for.',
        'cache_post' => 'Post cache',
        'cache_posts_comment' => 'Minutes to cache a list of posts for.',
        'cache_posts' => 'Posts cache',
        'description' => 'Enable or disable the blog API.',
        'is_enabled_comment' => 'When switched off, no blog endpoints will be available.',
        'is_enabled' => 'API endpoints',
        'label' => 'Settings',
    ],
];
