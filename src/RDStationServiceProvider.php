<?php

namespace Jetimob\RDStation;

use Illuminate\Support\ServiceProvider;
use Jetimob\RDStation\Console\InstallCommand;

/**
 * Class RDStationServiceProvider
 * @package Jetimob\RDStation
 */
class RDStationServiceProvider extends ServiceProvider
{
    private function getConfigPath(): string
    {
        return __DIR__ . '/../config/config.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'rdstation');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $this->getConfigPath() => config_path('rdstation.php'),
            ], 'config');

            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->app->singleton('rdstation', function () {
            return new RDStation(config('rdstation.http'));
        });
    }
}
