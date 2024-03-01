<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\{LevelSetList, SetList};
use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    // Ensure file system caching is used instead of in-memory.
    $rectorConfig->cacheClass(FileCacheStorage::class);

    // Specify a path that works locally as well as on CI job runners.
    $rectorConfig->cacheDirectory('/tmp/rector');

    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->phpstanConfigs([
        __DIR__ . '/phpstan.neon',
    ]);

    // basic rules
    $rectorConfig->importNames();

    $rectorConfig->rules([
        InlineConstructorDefaultToPropertyRector::class,
    ]);

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_82,
        SetList::PHP_82,
        LevelSetList::UP_TO_PHP_83,
        SetList::PHP_83,
    ]);

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::TYPE_DECLARATION,
        SetList::PRIVATIZATION,
        SetList::CODING_STYLE,
    ]);
};
