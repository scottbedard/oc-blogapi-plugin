<?php namespace Bedard\BlogApi;

use Backend;
use System\Classes\PluginBase;

/**
 * BlogApi Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'bedard.blogapi::lang.plugin.name',
            'description' => 'bedard.blogapi::lang.plugin.description',
            'author'      => 'Scott Bedard',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'bedard.blogapi.manage' => [
                'label' => 'bedard.blogapi::lang.plugin.permission_manage',
                'tab' => 'bedard.blogapi::lang.plugin.name',
            ],
        ];
    }

    /**
     * Register settings models.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'api' => [
                'label'         => 'bedard.blogapi::lang.settings.label',
                'description'   => 'bedard.blogapi::lang.settings.description',
                'category'      => 'bedard.blogapi::lang.plugin.name',
                'class'         => 'Bedard\BlogApi\Models\Settings',
                'permissions'   => ['bedard.blogapi.*'],
                'icon'          => 'icon-cog',
            ],
        ];
    }
}
