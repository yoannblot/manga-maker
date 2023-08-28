<?php

declare(strict_types=1);

namespace App;

use App\Command\DownloadMangaCommand;
use MangaMaker\Infrastructure\StdoutLogger;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final readonly class Kernel
{
    private ContainerBuilder $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();

        $this->container->register(LoggerInterface::class, StdoutLogger::class);
        $this->container->register(DownloadMangaCommand::class, DownloadMangaCommand::class)
            ->addArgument($this->container->get(LoggerInterface::class));
    }

    public function get(string $id): ?object
    {
        return $this->container->get($id);
    }
}
