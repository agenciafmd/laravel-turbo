<?php

declare(strict_types=1);

namespace Agenciafmd\Turbo\Tests\Feature\Middlewares;

use Agenciafmd\Turbo\Middlewares\RemoveComments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('removes the html comments but keeps the comments inside style tags', function (): void {
    $html = '<html><head><style>/* mantido */ body { color: red; }</style></head><body><!-- removido --><p>Texto</p></body></html>';

    $result = new RemoveComments()->apply($html);

    expect($result)->toContain('/* mantido */')
        ->and($result)->not->toContain('<!-- removido -->');
});
