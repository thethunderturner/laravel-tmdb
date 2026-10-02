<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb\Endpoints\TV;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class TvSeriesLIst
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Get a list of TV shows airing today.
     * @link https://developer.themoviedb.org/reference/tv-series-airing-today-list
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function airingToday(?array $query): array
    {
        return $this->client->get('/movie/airing_today', $query);
    }

    /**
     * @description Get a list of TV shows that air in the next 7 days.
     * @link https://developer.themoviedb.org/reference/tv-series-airing-today-list
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function onTheAir(?array $query): array
    {
        return $this->client->get('/tv/on_the_air', $query);
    }

    /**
     * @description Get a list of TV shows ordered by popularity.
     * @link https://developer.themoviedb.org/reference/tv-series-popular-list
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function popular(?array $query): array
    {
        return $this->client->get('/tv/popular', $query);
    }

    /**
     * @description Get a list of TV shows ordered by rating.
     * @link https://developer.themoviedb.org/reference/tv-series-top-rated-list
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function topRated(?array $query): array
    {
        return $this->client->get('/tv/top_rated', $query);
    }
}
