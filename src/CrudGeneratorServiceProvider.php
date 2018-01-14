<?php

namespace Fishmad\Dashboard;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/views/' => base_path('resources/views/'),
        ]);

        if (\App::VERSION() <= '5.2') {
            $this->publishes([
                __DIR__ . '/../publish/css/app.css' => public_path('css/app.css'),
            ]);
        }

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Fishmad\Dashboard\Commands\CrudCommand',
            'Fishmad\Dashboard\Commands\CrudControllerCommand',
            'Fishmad\Dashboard\Commands\CrudModelCommand',
            'Fishmad\Dashboard\Commands\CrudMigrationCommand',
            'Fishmad\Dashboard\Commands\CrudViewCommand',
            'Fishmad\Dashboard\Commands\CrudLangCommand',
            'Fishmad\Dashboard\Commands\CrudApiCommand',
            'Fishmad\Dashboard\Commands\CrudApiControllerCommand'
        );
    }
}
