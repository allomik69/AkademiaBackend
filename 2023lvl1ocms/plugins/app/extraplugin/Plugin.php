<?php namespace App\ExtraPlugin;

use Backend;
use System\Classes\PluginBase;

/**
 * extraPlugin Plugin Information File
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
            'name'        => 'extraPlugin',
            'description' => 'No description provided yet...',
            'author'      => 'app',
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
        \App\Arrival\Models\Arrival::extend(function ($arrival)
        {
            $arrival->bindEvent('model.afterCreate', function () use ( $arrival) {
                \Log::info("{$arrival->name} was created at {$arrival->arrival}!");
            });
        }); 
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
            'App\ExtraPlugin\Components\MyComponent' => 'myComponent',
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
            'app.extraplugin.some_permission' => [
                'tab' => 'extraPlugin',
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
        return []; // Remove this line to activate

        return [
            'extraplugin' => [
                'label'       => 'extraPlugin',
                'url'         => Backend::url('app/extraplugin/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['app.extraplugin.*'],
                'order'       => 500,
            ],
        ];
    }
}
