<?php

declare(strict_types=1);

namespace MangaMaker\Domain;

final readonly class MangaName
{
    public function __construct(public string $name, public int $volume)
    {
    }
}
