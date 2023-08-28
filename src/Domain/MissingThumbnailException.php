<?php

declare(strict_types=1);

namespace MangaMaker\Domain;

use LogicException;

final class MissingThumbnailException extends LogicException
{
    public function __construct()
    {
        parent::__construct('Missing thumbnail on Manga');
    }
}
