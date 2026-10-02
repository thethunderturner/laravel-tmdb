<?php

namespace LaravelTmdb\LaravelTmdb\Endpoints\Movies;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class Movies
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Get the top level details of a movie by ID.
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function details(int $id, ?array $query): array
    {
        return $this->client->get("/movie/{$id}", $query);
    }

    /**
     * @description Get the rating, watchlist and favourite status of an account.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function accountStates(int $movie_id, ?array $query): array {
        return $this->client->get("/movie/{$movie_id}/account_states", $query);
    }

    /**
     * @description Get the rating, watchlist and favourite status of an account.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function alternativeTitles(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/alternative_titles", $query);
    }

    /**
     * @description Get the recent changes for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function changes(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/changes", $query);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function credits(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/credits", $query);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function externalIds(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/external_ids", $query);
    }

    /**
     * @description Get the images that belong to a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function images(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/images", $query);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function keywords(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/keywords", $query);
    }

    /**
     * @description Get the newest movie ID.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function latest(): array
    {
        return $this->client->get("/movie/latest");
    }

    /**
     * @description Get the lists that a movie has been added to.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function lists(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/lists", $query);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function recommendations(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/recommendations", $query);
    }

    /**
     * @description Get the release dates and certifications for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function releaseDates(int $movie_id): array
    {
        return $this->client->get("/movie/{$movie_id}/release_dates");
    }

    /**
     * @description Get the user reviews for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function reviews(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/reviews", $query);
    }

    /**
     * @description Get the translations for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function translations(int $movie_id): array
    {
        return $this->client->get("/movie/{$movie_id}/translations");
    }

    /**
     * Get the translations for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function videos(int $movie_id): array
    {
        return $this->client->get("/movie/{$movie_id}/videos");
    }

    /**
     * Get the translations for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function watchProviders(int $movie_id): array
    {
        return $this->client->get("/movie/{$movie_id}/videos");
    }
}
