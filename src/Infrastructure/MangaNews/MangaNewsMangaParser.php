<?php

declare(strict_types=1);

namespace MangaMaker\Infrastructure\MangaNews;

use DOMDocument;
use DOMXPath;
use MangaMaker\Domain\MangaName;
use MangaMaker\Domain\MangaParser;
use MangaMaker\Domain\MissingThumbnailException;

final readonly class MangaNewsMangaParser implements MangaParser
{
    public function getName(string $content): MangaName
    {
        preg_match("/<title>Manga news - preview ([^<]*) ([0-9]+)<\/title>/im", $content, $matches);

        return new MangaName($matches[1], (int) $matches[2]);
    }

    public function getCoverImage(string $content): string
    {
        $document = new DOMDocument();
        $document->loadHTML($content);
        $node = (new DOMXPath($document))->query('//meta[@itemprop="image"]')->item(0);
        if ($node === null) {
            throw new MissingThumbnailException();
        }

        return $node->getAttribute('content');
    }
}
