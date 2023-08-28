<?php

declare(strict_types=1);

namespace Tests\Unit\Command;

use App\Command\DownloadMangaCommand;
use MangaMaker\Infrastructure\StdoutLogger;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class DownloadMangaCommandTest extends TestCase
{
    private DownloadMangaCommand $command;

    protected function setUp(): void
    {
        $this->command = new DownloadMangaCommand(new StdoutLogger());
    }

    #[Test]
    public function it_downloads_a_manga(): void
    {
        // Arrange & Act
        $this->command->__invoke();

        // Assert
        $output = $this->output();
        $this->assertStringContainsString('Manga downloaded!', $output);
    }
}
