<?php

declare(strict_types=1);

namespace Tests\Unit\Infrastructure\MangaNews;

use MangaMaker\Domain\MissingThumbnailException;
use MangaMaker\Infrastructure\MangaNews\MangaNewsMangaParser;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Fixtures\FixturesFactory;

final class MangaNewsMangaParserTest extends TestCase
{
    private MangaNewsMangaParser $sut;

    protected function setUp(): void
    {
        $this->sut = new MangaNewsMangaParser();
    }

    #[Test]
    public function it_parses_a_manga_name(): void
    {
        // Arrange
        $content = file_get_contents(FixturesFactory::getYokaiWars1());

        // Act
        $mangaName = $this->sut->getName($content);

        // Assert
        $this->assertSame('Yokai Wars', $mangaName->name);
    }

    #[Test]
    public function it_parses_a_manga_name_with_prefix(): void
    {
        // Arrange
        $content = file_get_contents(FixturesFactory::getEcoleImpudique2());

        // Act
        $mangaName = $this->sut->getName($content);

        // Assert
        $this->assertSame("Ecole impudique (l')", $mangaName->name);
    }

    #[Test]
    public function it_parses_a_manga_volume_number(): void
    {
        // Arrange
        $content = file_get_contents(FixturesFactory::getYokaiWars1());

        // Act
        $mangaName = $this->sut->getName($content);

        // Assert
        $this->assertSame(1, $mangaName->volume);
    }

    #[Test]
    public function it_parses_a_manga_volume_number_2(): void
    {
        // Arrange
        $content = file_get_contents(FixturesFactory::getEcoleImpudique2());

        // Act
        $mangaName = $this->sut->getName($content);

        // Assert
        $this->assertSame(2, $mangaName->volume);
    }

    #[Test]
    public function it_parses_a_cover_image(): void
    {
        // Arrange
        $content = file_get_contents(FixturesFactory::getYokaiWars1());

        // Act
        $coverImage = $this->sut->getCoverImage($content);

        // Assert
        $this->assertSame(
            'https://www.manga-news.com/public/manga_previews/yokai-wars/files/assets/cover300.jpg',
            $coverImage
        );
    }

    #[Test]
    public function it_fails_to_parse_an_empty_cover_image(): void
    {
        // Arrange
        $content = file_get_contents(FixturesFactory::getEcoleImpudique2());

        // Assert
        $this->expectException(MissingThumbnailException::class);

        // Act
        $this->sut->getCoverImage($content);
    }
}
