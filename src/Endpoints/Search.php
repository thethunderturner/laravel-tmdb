<?php

namespace LaravelTmdb\LaravelTmdb\Endpoints;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class Search
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Search for collections.
     * @link https://developer.themoviedb.org/reference/search-collection
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function collection(string $query, bool $include_adult = false, string $language = 'en-US', int $page = 1, string $region = 'US'): array
    {
        return $this->client->get('/search/collection', ['query' => $query, 'page' => $page, 'include_adult' => $include_adult, 'language' => $language, 'region' => $region]);
    }

    /**
     * @description Search for companies by their original and alternative names.
     * @link https://developer.themoviedb.org/reference/search-company
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function company(string $query, int $page = 1): array
    {
        return $this->client->get('/search/company', ['query' => $query, 'page' => $page]);
    }

    /**
     * @description Search for keywords by their name.
     * @link https://developer.themoviedb.org/reference/search-keyword
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function keyword(string $query, int $page = 1): array
    {
        return $this->client->get('/search/keyword', ['query' => $query, 'page' => $page]);
    }

    /**
     * @description Search for movies by their original, translated and alternative titles.
     * @link https://developer.themoviedb.org/reference/search-movie
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function movie(string $query, bool $include_adult = false, string $language = 'en-US', string $primary_release_year = '', int $page = 1, string $region = 'US', ?int $year = null): array
    {
        return $this->client->get('/search/movie', ['query' => $query, 'page' => $page, 'include_adult' => $include_adult, 'language' => $language, 'region' => $region, 'primary_release_year' => $primary_release_year, 'year' => $year]);
    }

    /**
     * @description Use multi search when you want to search for movies, TV shows and people in a single request.
     * @link https://developer.themoviedb.org/reference/search-multi
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function multi(string $query, bool $include_adult = false, string $language = 'en-US', int $page = 1): array
    {
        return $this->client->get('/search/multi', ['query' => $query, 'page' => $page, 'include_adult' => $include_adult, 'language' => $language]);
    }

    /**
     * @description Search for people by their name and also known as names.
     * @link https://developer.themoviedb.org/reference/search-person
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function person(string $query, bool $include_adult = false, string $language = 'en-US', int $page = 1): array
    {
        return $this->client->get('/search/person', ['query' => $query, 'page' => $page, 'include_adult' => $include_adult, 'language' => $language]);
    }

    /**
     * @description Search for TV shows by their original, translated and also known as names.
     * @link https://developer.themoviedb.org/reference/tv
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function tv(string $query, ?int $first_air_date_year = null, bool $include_adult = false, string $language = 'en-US', int $page = 1, ?int $year = null): array
    {
        return $this->client->get('/search/tv', ['query' => $query, 'page' => $page, 'include_adult' => $include_adult, 'language' => $language, 'first_air_date_year' => $first_air_date_year, 'year' => $year]);
    }
}
