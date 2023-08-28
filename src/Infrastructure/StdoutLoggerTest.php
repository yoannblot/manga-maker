<?php

declare(strict_types=1);

namespace MangaMaker\Infrastructure;

namespace MangaMaker\Infrastructure;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class StdoutLoggerTest extends TestCase
{
    public static function logLevelsDataProvider(): array
    {
        return [
            'emergency' => ['emergency'],
            'alert' => ['alert'],
            'critical' => ['critical'],
            'error' => ['error'],
            'warning' => ['warning'],
            'notice' => ['notice'],
            'info' => ['info'],
            'debug' => ['debug'],
        ];
    }

    private StdoutLogger $sut;

    protected function setUp(): void
    {
        $this->sut = new StdoutLogger();
    }

    #[Test]
    #[DataProvider('logLevelsDataProvider')]
    public function it_outputs_logs_level_to_stdout(string $logLevel): void
    {
        // Arrange & Act
        $this->sut->log($logLevel, 'test');

        // Assert
        $output = $this->output();
        $this->assertStringContainsString($logLevel, $output);
    }

    #[Test]
    public function it_outputs_a_valid_format(): void
    {
        // Arrange & Act
        $this->sut->log('warning', 'this is a test');

        // Assert
        $output = $this->output();
        $this->assertStringContainsString('[warning] this is a test', $output);
    }
}
