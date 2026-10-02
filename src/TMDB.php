<?php

namespace LaravelTmdb\LaravelTmdb;

class TMDB
{
    public function __construct(
        protected Movies $movies,
    ) {}

    public function movies(): Movies
    {
        return $this->movies;
    }
}
