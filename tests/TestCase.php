<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb\Tests;

use LaravelTmdb\LaravelTmdb\LaravelTmdbServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelTmdbServiceProvider::class,
        ];
    }
}
