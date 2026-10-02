<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb;

use LaravelTmdb\LaravelTmdb\Endpoints\Movies\Movies;

class LaravelTMDB
{
    public function __construct(
        protected Movies $movies,
    ) {}

    public function movies(): Movies
    {
        return $this->movies;
    }
}
