<?php

namespace LaravelTmdb\LaravelTmdb\Endpoints\TV;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class Tv
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Get the details of a TV show.
     * @link https://developer.themoviedb.org/reference/tv-series-details
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function details(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}", $query);
    }

    /**
     * @description Get the rating, watchlist and favourite status.
     * @link https://developer.themoviedb.org/reference/tv-series-account-states
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function accountStates(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/account_states", $query);
    }

    /**
     * @description Get the rating, watchlist and favourite status of an account.
     * @link https://developer.themoviedb.org/reference/tv-series-alternative-titles
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function alternativeTitles(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/alternative_titles", $query);
    }

    /**
     * @description Get the recent changes for a movie.
     * @link https://developer.themoviedb.org/reference/tv-series-changes
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function changes(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/changes", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/tv-series-credits
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function credits(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/credits", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/tv-series-external-ids
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function externalIds(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/external_ids", $query);
    }

    /**
     * @description Get the images that belong to a movie.
     * @link https://developer.themoviedb.org/reference/tv-series-images
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function images(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/images", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/tv-series-keywords
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function keywords(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/keywords", $query);
    }

    /**
     * @description Get the newest movie ID.
     * @link https://developer.themoviedb.org/reference/tv-series-latest-id
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function latest(): array
    {
        return $this->client->get('/tv/latest');
    }

    /**
     * @description Get the lists that a movie has been added to.
     * @link https://developer.themoviedb.org/reference/tv-series-lists
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function lists(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/lists", $query);
    }

    /**
     * @link https://developer.themoviedb.org/reference/tv-series-recommendations
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function recommendations(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/recommendations", $query);
    }

    /**
     * @description Get the release dates and certifications for a movie.
     * @link https://developer.themoviedb.org/reference/tv-series-release-dates
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function releaseDates(int $series_id): array
    {
        return $this->client->get("/tv/{$series_id}/release_dates");
    }

    /**
     * @description Get the user reviews for a movie.
     * @link https://developer.themoviedb.org/reference/tv-series-reviews
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function reviews(int $series_id, ?array $query): array
    {
        return $this->client->get("/tv/{$series_id}/reviews", $query);
    }

    /**
     * @description Get the translations for a movie.
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function translations(int $series_id): array
    {
        return $this->client->get("/tv/{$series_id}/translations");
    }

    /**
     * @description Get the translations for a movie.
     * @link https://developer.themoviedb.org/reference/tv-series-videos
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function videos(int $series_id): array
    {
        return $this->client->get("/tv/{$series_id}/videos");
    }

    /**
     * @description Get the list of streaming providers we have for a movie.
     * @note Availability data provided by JustWatch!
     * @link https://developer.themoviedb.org/reference/tv-series-watch-providers
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    public function watchProviders(int $series_id): array
    {
        return $this->client->get("/tv/{$series_id}/watch/providers");
    }
}
