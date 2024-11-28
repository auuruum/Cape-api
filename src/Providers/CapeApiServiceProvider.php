<?php

namespace Azuriom\Plugin\CapeApi\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Models\Permission;

class CapeApiServiceProvider extends BasePluginServiceProvider
{
    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViews();
        $this->loadTranslations();
        $this->loadMigrations();
        $this->registerRouteDescriptions();
        $this->registerAdminNavigation();
        $this->registerUserNavigation();

        Permission::registerPermissions([
            'admin.cape-api' => 'cape-api::admin.permissions.admin',
        ]);
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            'cape-api.cape' => trans('cape-api::messages.profile.title'),
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'cape-api' => [
                'name' => trans('cape-api::admin.title'),
                'title' => trans('cape-api::admin.description'),
                'icon' => 'bi bi-gear',
                'route' => 'cape-api.admin.settings',
                'permission' => 'admin.cape-api',
            ],
        ];
    }

    /**
     * Return the user navigations routes to register in the navbar.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [
            'cape' => [
                'name' => trans('cape-api::messages.title'),
                'title' => trans('cape-api::messages.description'),
                'icon' => setting('cape-api.icon', 'bi bi-person-circle'),
                'route' => 'cape-api.cape',
            ],
        ];
    }
}
