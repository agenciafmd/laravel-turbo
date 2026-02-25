<?php

use VinkiusLabs\LaravelPageSpeed\Middleware\CollapseWhitespace;
use VinkiusLabs\LaravelPageSpeed\Middleware\ElideAttributes;
use VinkiusLabs\LaravelPageSpeed\Middleware\InsertDNSPrefetch;
use VinkiusLabs\LaravelPageSpeed\Middleware\RemoveComments;
use VinkiusLabs\LaravelPageSpeed\Middleware\RemoveQuotes;
use Silber\PageCache\Middleware\CacheResponse;

return [
    'enable' => env('TURBO_ENABLE', true),
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
