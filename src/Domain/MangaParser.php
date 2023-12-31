<?php

declare(strict_types=1);

namespace MangaMaker\Domain;

interface MangaParser
{
    public function getName(string $content): MangaName;

    /**
     * @throws MissingThumbnailException
     */
    public function getCoverImage(string $content): string;
}
