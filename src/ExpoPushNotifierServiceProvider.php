<?php

namespace VientoDigital\ExpoPushNotifier;

use Illuminate\Support\ServiceProvider;

class ExpoPushNotifierServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'vientodigital');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'vientodigital');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/expopushnotifier.php' => config_path('expopushnotifier.php'),
            ], 'expopushnotifier.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/vientodigital'),
            ], 'expopushnotifier.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/vientodigital'),
            ], 'expopushnotifier.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/vientodigital'),
            ], 'expopushnotifier.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/expopushnotifier.php', 'expopushnotifier');

        // Register the service the package provides.
        $this->app->singleton('expopushnotifier', function ($app) {
            return new ExpoPushNotifier;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['expopushnotifier'];
    }
}