<?php

namespace Cpkm\Basic;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Blade;

class BasicServiceProvider extends ServiceProvider
{
    protected $events = [
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->mergeConfigFrom(__DIR__.'/../config/basic.php', 'basic');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php','basic');
        $this->loadViewsFrom(__DIR__.'/../resources/views/basic', 'basic');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'basic');
        // $this->loadMigrationsFrom(__DIR__ .'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views/basic' => resource_path('views/vendor/basic'),
        ], 'basic-views');

        $this->publishes([
            __DIR__.'/../lang' => lang_path('vendor/basic'),
        ], 'basic-translations');

        $this->publishes([
            __DIR__.'/../config/basic.php' => config_path('basic.php'),
        ], 'basic-config');
        
        // $this->publishes([
        //     __DIR__.'/../database/migrations' => database_path('migrations'),
        // ], 'lease-migrations');

        
        // Blade::componentNamespace('Cpkm\\Excel\\View\\Components\\Backend', 'backend');
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
