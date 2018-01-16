<?php

namespace Fishmad\Checkmate;

use File;
use Illuminate\Support\ServiceProvider;

class CheckmateServiceProvider extends ServiceProvider
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
  public function boot(\Illuminate\Routing\Router $router)
  {

    // $this->publishes([
    //     __DIR__ . '/../publish/migrations/' => database_path('migrations'),
    // ]);

    // $this->publishes([
    //     __DIR__ . '/../publish/Model/' => app_path(),
    // ]);

    $this->publishes([
        __DIR__ . '/../publish/config/crudgenerator.php' => config_path('crudgenerator.php'),
    ]);

    $this->publishes([
        __DIR__ . '/../publish/Controllers/' => app_path('Http/Controllers'),
    ]);

    $this->publishes([
        __DIR__ . '/../publish/public/' => base_path('public'),
    ]);

    $this->publishes([
        __DIR__ . '/../publish/resources/' => base_path('resources'),
    ]);

    $this->publishes([
        __DIR__ . '/../publish/resources/views' => base_path('resources/views/vendor/checkmate'),
    ], 'views');

      $this->loadViewsFrom(__DIR__ . '/views', 'checkmate');

      // $menus = [];
      // if (File::exists(base_path('resources/checkmate/menus.json'))) {
      //     $menus = json_decode(File::get(base_path('resources/checkmate/menus.json')));
      //     view()->share('laravelAdminMenus', $menus);
      // }

  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->commands(
        'Fishmad\Checkmate\InstallCommand'
    );
  }

}