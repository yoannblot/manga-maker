<?php

declare(strict_types=1);

namespace MangaMaker\Infrastructure\MangaNews;

use MangaMaker\Domain\MangaName;
use MangaMaker\Domain\MangaParser;

final readonly class MangaNewsMangaParser implements MangaParser
{
    public function getName(string $content): MangaName
    {
        preg_match("/<title>Manga news - preview ([^<]*) ([0-9]+)<\/title>/im", $content, $matches);

        return new MangaName($matches[1], (int) $matches[2]);
    }
}
