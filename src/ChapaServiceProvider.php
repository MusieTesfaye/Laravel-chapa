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
        
        // Publish configuration
        $this->publishes([
            __DIR__.'/config/chapa.php' => config_path('chapa.php'),
        ], 'config');
        
        // Publish controllers
        $this->publishes([
            __DIR__.'/controllers/ChapaController.php' => app_path('Http/Controllers/Chapa'),
        ], 'controllers');
        
        // Publish facades
        $this->publishes([
            __DIR__.'/Facades/Chapa.php' => app_path('Facades/Chapa'),
        ], 'facades');
        
        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/musie'),
        ], 'views');
        
        // Publish services
        $this->publishes([
            __DIR__.'/Services/ChapaService' => app_path('Services/Chapa'),
        ], 'services');
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
