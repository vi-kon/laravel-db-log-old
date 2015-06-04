<?php

namespace ViKon\DbLog;

use Illuminate\Support\ServiceProvider;

/**
 * Class DbLogServiceProvider
 *
 * @author  Kovács Vince <vincekovacs@hotmail.com>
 *
 * @package ViKon\DbLog
 */
class DbLogServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('/vi-kon/db-log.php')], 'config');
        $this->publishes([__DIR__ . '/../../database/migrations/' => base_path('/database/migrations')], 'migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['log.db'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('log.db', 'ViKon\DbLog\DbLogger');
    }
}