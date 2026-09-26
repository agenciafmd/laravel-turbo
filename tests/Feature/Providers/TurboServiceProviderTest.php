<?php

declare(strict_types=1);

namespace Agenciafmd\Turbo\Tests\Feature\Providers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\Router;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('registers the turbo middleware group with the configured middlewares', function (): void {
    $middlewareGroups = resolve(Router::class)->getMiddlewareGroups();

    expect($middlewareGroups['turbo'])->toBe(config('laravel-turbo.middlewares'));
});
