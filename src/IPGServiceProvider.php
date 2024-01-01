<?php

namespace Alikhedmati\IPG;

use Illuminate\Support\ServiceProvider;

class IPGServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ .'/../config/IPG.php',
            'IPG'
        );

        $this->app->bind('IPG', fn($app) => new IPGManager($app));
    }

    /**
     * @return void
     */

    public function boot(): void
    {
        $this->publishes([
            __DIR__ .'/../config/IPG.php'   =>  config_path('IPG.php')
        ], 'config');
    }
}