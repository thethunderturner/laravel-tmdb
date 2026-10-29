<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb\Endpoints\Movies;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class MovieLists
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Get a list of movies that are currently in theatres.
     * @link https://developer.themoviedb.org/reference/movie-now-playing-list
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function nowPlaying(?array $query): array
    {
        return $this->client->get('/movie/now_playing', $query);
    }

    /**
     * @description Get a list of movies ordered by popularity.
     * @link https://developer.themoviedb.org/reference/movie-popular-list
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function popular(?array $query = []): array
    {
        return $this->client->get('/movie/popular', $query);
    }

    /**
     * @description Get a list of movies ordered by rating.
     * @link https://developer.themoviedb.org/reference/movie-top-rated-list
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function topRated(?array $query = []): array
    {
        return $this->client->get('/movie/top_rated', $query);
    }

    /**
     * @description Get a list of movies that are being released soon.
     * @link https://developer.themoviedb.org/reference/movie-upcoming-list
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function upcoming(?array $query = []): array
    {
        return $this->client->get('/movie/upcoming', $query);
    }
}
