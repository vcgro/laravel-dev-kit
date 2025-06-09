<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\TelescopeServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider as LibTelescopeServiceProvider;

$localProviders = [];
if (
    app()->environment('local')
    && class_exists(LibTelescopeServiceProvider::class)
    && class_exists(TelescopeServiceProvider::class)
) {
    $localProviders[] = LibTelescopeServiceProvider::class;
    $localProviders[] = TelescopeServiceProvider::class;
}

return [
    AppServiceProvider::class,
    ...$localProviders
];
