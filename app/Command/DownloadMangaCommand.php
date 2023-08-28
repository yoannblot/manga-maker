<?php

declare(strict_types=1);

namespace App\Command;

use Psr\Log\LoggerInterface;

final readonly class DownloadMangaCommand
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(): void
    {
        $this->logger->info('Manga downloaded!');
    }
}
