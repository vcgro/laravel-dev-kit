<?php

/**
 * @see https://getrector.com/documentation
 * @see https://github.com/driftingly/rector-laravel
 */

declare(strict_types=1);

use Rector\Config\RectorConfig;
use RectorLaravel\Set\LaravelLevelSetList;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
        __DIR__ . '/artisan',
    ])
    ->withSkip([
        __DIR__ . '/bootstrap/cache',
        # Telescope
        __DIR__ . '/app/Providers/TelescopeServiceProvider.php',
        __DIR__ . '/config/telescope.php',
        __DIR__ . '/database/migrations/0001_01_01_000003_create_telescope_entries_table.php',
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: true,
        instanceOf: true,
        // earlyReturn: true,
        // strictBooleans: true,
        carbon: true,
        rectorPreset: true,
        phpunitCodeQuality: true,
    )
    ->withSets([
        // LaravelSetList::LARAVEL_STATIC_TO_INJECTION,
        // LaravelSetList::LARAVEL_IF_HELPERS,
        LaravelLevelSetList::UP_TO_LARAVEL_120,
        LaravelSetList::LARAVEL_LEGACY_FACTORIES_TO_CLASSES,
        LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
        LaravelSetList::LARAVEL_ELOQUENT_MAGIC_METHOD_TO_QUERY_BUILDER,
        LaravelSetList::LARAVEL_CONTAINER_STRING_TO_FULLY_QUALIFIED_NAME,
        LaravelSetList::LARAVEL_COLLECTION,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
        LaravelSetList::LARAVEL_ARRAYACCESS_TO_METHOD_CALL,
    ])
    ->withPhpSets(php84: true)
    ->withAttributesSets()
    ->withImportNames(removeUnusedImports: true);
