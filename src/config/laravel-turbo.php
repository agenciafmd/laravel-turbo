<?php

use RenatoMarinho\LaravelPageSpeed\Middleware\CollapseWhitespace;
use RenatoMarinho\LaravelPageSpeed\Middleware\RemoveComments;
use RenatoMarinho\LaravelPageSpeed\Middleware\RemoveQuotes;
use Silber\PageCache\Middleware\CacheResponse;

return [
    'enable' => env('TURBO_ENABLE', true),
    'middlewares' => [
        CacheResponse::class,
        RemoveComments::class,
        RemoveQuotes::class,
        CollapseWhitespace::class,
    ]
];