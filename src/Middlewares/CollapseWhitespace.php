<?php

declare(strict_types=1);

namespace Agenciafmd\Turbo\Middlewares;

use VinkiusLabs\LaravelPageSpeed\Middleware\CollapseWhitespace as CollapseWhitespaceBase;

final class CollapseWhitespace extends CollapseWhitespaceBase
{
    /**
     * @param  string  $buffer
     */
    protected function removeComments($buffer): string
    {
        return (new RemoveComments)->apply($buffer);
    }
}
