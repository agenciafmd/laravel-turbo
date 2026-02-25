<?php

declare(strict_types=1);

use Agenciafmd\Turbo\Middlewares\CollapseWhitespace;
use Agenciafmd\Turbo\Middlewares\RemoveComments;
use Silber\PageCache\Middleware\CacheResponse;
use VinkiusLabs\LaravelPageSpeed\Middleware\ElideAttributes;
use VinkiusLabs\LaravelPageSpeed\Middleware\InsertDNSPrefetch;
use VinkiusLabs\LaravelPageSpeed\Middleware\RemoveQuotes;

return [
    'enabled' => env('TURBO_ENABLED', true),
    'middlewares' => [
        CacheResponse::class,
        RemoveComments::class,
        RemoveQuotes::class,
        /* não mude a ordem */
        ElideAttributes::class,
        InsertDNSPrefetch::class,
        CollapseWhitespace::class,
    ],
];
