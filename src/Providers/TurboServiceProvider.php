<?php

namespace Agenciafmd\Turbo\Providers;

use Illuminate\Support\ServiceProvider;

class TurboServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setMiddlewares();

        $this->publish();
    }

    public function register(): void
    {
        $this->loadConfigs();
    }

    protected function setMiddlewares(): void
    {
        $turboGroup = [];
        if (config('laravel-turbo.enable')) {
            $turboGroup = array_merge($turboGroup, config('laravel-turbo.middlewares'));
        }

        $this->app->router->middlewareGroup('turbo', $turboGroup);
    }

    protected function loadConfigs(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-turbo.php', 'laravel-turbo');
    }

    protected function publish(): void
    {
        $this->publishes([
            __DIR__ . '/../../config' => base_path('config'),
        ], 'laravel-turbo:config');
    }
}
