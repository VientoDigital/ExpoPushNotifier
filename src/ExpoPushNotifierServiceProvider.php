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
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/expopushnotifier.php' => config_path('expopushnotifier.php'),
            ], 'expopushnotifier.config');
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