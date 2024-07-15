<?php

namespace Musie\LaravelChapa;

use Illuminate\Support\ServiceProvider;
use Musie\LaravelChapa\Console\Commands\InstallCommand;

class ChapaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chapa');
        $this->publishes([
            __DIR__.'/config/chapa.php' => config_path('chapa.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/chapa.php', 'chapa'
        );

        $this->app->singleton('chapa', function () {
            return new Services\ChapaService();
        });

        // Register the command if the application is running in console
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
