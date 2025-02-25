<?php

namespace Agenciafmd\Turbo\Providers;

use Illuminate\Support\ServiceProvider;

class TurboServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setMiddlewares();

        $this->bootPublish();
    }

    public function register(): void
    {
        $this->registerConfigs();
    }

    protected function setMiddlewares(): void
    {
        $turboGroup = [];
        if (config('laravel-turbo.enable')) {
            $turboGroup = array_merge($turboGroup, config('laravel-turbo.middlewares'));
        }

        $this->app->router->middlewareGroup('turbo', $turboGroup);
    }

    protected function registerConfigs(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-turbo.php', 'laravel-turbo');
    }

    protected function bootPublish(): void
    {
        $this->publishes([
            __DIR__ . '/../../config' => base_path('config'),
        ], 'laravel-turbo:config');
    }
}
