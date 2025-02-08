<?php

namespace DebugBird\Laravel;

use Illuminate\Support\ServiceProvider;
use DebugBird\DebugBird;

class DebugBirdServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/debugbird.php', 'debugbird');
    }

    public function boot()
    {
        $configPath = $this->app->basePath() . '/config/debugbird.php';

        $this->publishes([
            __DIR__ . '/../config/debugbird.php' => $configPath,
        ], 'debugbird-config');

        $this->app->singleton(DebugBird::class, function ($app) {
            return new DebugBird([
                'project_id' => $this->app['config']->get('debugbird.project_id'),
                'api_key' => $this->app['config']->get('debugbird.api_key'),
                'disable_logs' => $this->app['config']->get('debugbird.disable_logs', false),
                'disable_errors' => $this->app['config']->get('debugbird.disable_errors', false),
            ]);
        });
    }
}
