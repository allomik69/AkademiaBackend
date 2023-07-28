<?php namespace Teamgrid\TimeEntry;

use Backend;
use System\Classes\PluginBase;

/**
 * TimeEntry Plugin Information File
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
            'name'        => 'TimeEntry',
            'description' => 'No description provided yet...',
            'author'      => 'teamgrid',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Teamgrid\TimeEntry\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'teamgrid.timeentry.some_permission' => [
                'tab' => 'TimeEntry',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'timeentry' => [
                'label'       => 'Time Entry',
                'url'         => Backend::url('teamgrid/timeentry/timeentries'),
                'icon'        => 'icon-hourglass',
                'permissions' => ['teamgrid.timeentry.*'],
                'order'       => 500,
            ],
        ];
    }
}
