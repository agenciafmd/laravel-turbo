<?php

declare(strict_types=1);

namespace Agenciafmd\Turbo\Middlewares;

use VinkiusLabs\LaravelPageSpeed\Middleware\RemoveComments as RemoveCommentsBase;

final class RemoveComments extends RemoveCommentsBase
{
    protected function replaceInsideHtmlTags(array $tags, string $regex, string $replace, string $buffer): string
    {
        if (($key = array_search('style', $tags)) !== false) {
            unset($tags[$key]);
        }

        return parent::replaceInsideHtmlTags($tags, $regex, $replace, $buffer);
    }
}
