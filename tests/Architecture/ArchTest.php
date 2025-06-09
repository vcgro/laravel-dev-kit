<?php

declare(strict_types=1);

use App\Providers\TelescopeServiceProvider;

arch('Each classes must declare strict_types=1')
    ->expect('App')
    ->toUseStrictTypes()
    ->ignoring([TelescopeServiceProvider::class]);

arch('Debug functions forbidden')
    ->expect(['die', 'dd', 'dump', 'dumpType', 'var_dump'])
    ->not->toBeUsed();

arch('Laravel preset')
    ->preset()
    ->laravel();

arch('PHP preset')
    ->preset()
    ->php();

arch('Security preset')
    ->preset()
    ->security();
