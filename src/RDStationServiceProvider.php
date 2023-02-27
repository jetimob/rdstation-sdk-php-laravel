<?php

namespace Jetimob\RDStation;

use Illuminate\Support\ServiceProvider;
use Jetimob\RDStation\Console\HandleAuthorizationCodeExchange;
use Jetimob\RDStation\Console\InstallRDStationPackage;

class RDStationServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $src = realpath($raw = __DIR__ . '/../config/rdstation.php') ?: $raw;

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $src => config_path('rdstation.php')
            ], 'config');

            $this->commands([
                InstallRDStationPackage::class,
                HandleAuthorizationCodeExchange::class,
            ]);
        }

        $this->mergeConfigFrom($src, 'rdstation');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jetimob.rdstation', function ($app) {
            return new RDStation($app['config']['rdstation'] ?? []);
        });

        $this->app->alias('jetimob.rdstation', RDStation::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'jetimob.rdstation',
        ];
    }
}
