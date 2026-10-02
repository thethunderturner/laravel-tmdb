<?php

namespace LaravelTmdb\LaravelTmdb;

use Tmdb\Api\Movies;

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
