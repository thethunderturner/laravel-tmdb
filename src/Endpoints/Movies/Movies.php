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
     * @link https://developer.themoviedb.org/reference/movie-details
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
     * @link https://developer.themoviedb.org/reference/movie-account-states
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function accountStates(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/account_states", $query);
    }

    /**
     * @description Get the rating, watchlist and favourite status of an account.
     * @link https://developer.themoviedb.org/reference/movie-alternative-titles
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
     * @link https://developer.themoviedb.org/reference/movie-changes
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function changes(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/changes", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/movie-credits
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function credits(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/credits", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/movie-external-ids
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function externalIds(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/external_ids", $query);
    }

    /**
     * @description Get the images that belong to a movie.
     * @link https://developer.themoviedb.org/reference/movie-images
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function images(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/images", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/movie-keywords
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function keywords(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/keywords", $query);
    }

    /**
     * @description Get the newest movie ID.
     * @link https://developer.themoviedb.org/reference/movie-latest-id
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function latest(): array
    {
        return $this->client->get('/movie/latest');
    }

    /**
     * @description Get the lists that a movie has been added to.
     * @link https://developer.themoviedb.org/reference/movie-lists
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function lists(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/lists", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/movie-recommendations
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function recommendations(int $movie_id, ?array $query): array
    {
        return $this->client->get("/movie/{$movie_id}/recommendations", $query);
    }

    /**
     * @description Get the release dates and certifications for a movie.
     * @link https://developer.themoviedb.org/reference/movie-release-dates
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
     * @link https://developer.themoviedb.org/reference/movie-reviews
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
     * @description Get the translations for a movie.
     * @link https://developer.themoviedb.org/reference/movie-videos
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function videos(int $movie_id): array
    {
        return $this->client->get("/movie/{$movie_id}/videos");
    }

    /**
     * @description Get the list of streaming providers we have for a movie.
     * @note Availability data provided by JustWatch!
     * @link https://developer.themoviedb.org/reference/movie-watch-providers
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function watchProviders(int $movie_id): array
    {
        return $this->client->get("/movie/{$movie_id}/videos");
    }
}
