<?php

namespace LaravelTmdb\LaravelTmdb\Endpoints;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class Trending
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Get the trending movies, TV shows and people.
     * @link https://developer.themoviedb.org/reference/trending-all
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function all(string $time_window, ?array $query): array
    {
        return $this->client->get("/trending/all/{$time_window}", $query);
    }

    /**
     * @description Get the trending movies on TMDB.
     * @link https://developer.themoviedb.org/reference/trending-movies
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function movies(string $time_window, ?array $query): array
    {
        return $this->client->get("/trending/movie/{$time_window}", $query);
    }

    /**
     * @description Get the trending people on TMDB.
     * @link https://developer.themoviedb.org/reference/trending-people
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function people(string $time_window, ?array $query): array
    {
        return $this->client->get("/trending/person/{$time_window}", $query);
    }

    /**
     * @description Get the trending TV shows on TMDB.
     * @link https://developer.themoviedb.org/reference/trending-tv
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function tv(string $time_window, ?array $query): array
    {
        return $this->client->get("/trending/tv/{$time_window}", $query);
    }
}
