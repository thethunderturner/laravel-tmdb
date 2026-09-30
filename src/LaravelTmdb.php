<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb;

use Illuminate\Support\Facades\Facade;
use Tmdb\Client;

/**
 * @see Client
 */
class LaravelTmdb extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Client::class;
    }
}
