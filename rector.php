<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\{LevelSetList, SetList};
use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\Php84\Rector\MethodCall\NewMethodCallWithoutParenthesesRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->cacheClass(FileCacheStorage::class);
    $rectorConfig->cacheDirectory('/tmp/rector');

    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->phpstanConfigs([
        __DIR__ . '/phpstan.neon',
    ]);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_85,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::TYPE_DECLARATION,
        SetList::PRIVATIZATION,
        SetList::CODING_STYLE,
    ]);

    $rectorConfig->skip([
        NewMethodCallWithoutParenthesesRector::class,
    ]);
};
