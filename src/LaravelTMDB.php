<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb;

use LaravelTmdb\LaravelTmdb\Endpoints\Movies\MovieLists;
use LaravelTmdb\LaravelTmdb\Endpoints\Movies\Movies;
use LaravelTmdb\LaravelTmdb\Endpoints\Trending;
use LaravelTmdb\LaravelTmdb\Endpoints\TV\Tv;
use LaravelTmdb\LaravelTmdb\Endpoints\TV\TvSeriesLIst;

class LaravelTMDB
{
    public function __construct(
        protected Movies $movies,
        protected MovieLists $movieLists,
        protected Trending $trending,
        protected Tv $tv,
        protected TvSeriesLIst $tvSeriesList,
    ) {}

    public function movies(): Movies
    {
        return $this->movies;
    }

    public function movieLists(): MovieLists
    {
        return $this->movieLists;
    }

    public function trending(): Trending
    {
        return $this->trending;
    }

    public function tv(): Tv
    {
        return $this->tv;
    }

    public function tvSeriesList(): TvSeriesLIst
    {
        return $this->tvSeriesList;
    }
}
