<?php

declare(strict_types=1);

namespace Tests\Unit\Fixtures;

final readonly class FixturesFactory
{
    public static function getYokaiWars1(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'yokai-wars-1.html';
    }

    public static function getEcoleImpudique2(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'ecole-impudique-2.html';
    }
}
