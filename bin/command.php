<?php

declare(strict_types=1);

use App\Command\DownloadMangaCommand;
use App\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Kernel();
$app->get(DownloadMangaCommand::class)();
