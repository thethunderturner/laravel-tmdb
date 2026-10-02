<?php

namespace LaravelTmdb\LaravelTmdb\Endpoints;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use LaravelTmdb\LaravelTmdb\TMDBClient;

class People
{
    public function __construct(
        protected TMDBClient $client,
    ) {}

    /**
     * @description Query the top level details of a person.
     * @link https://developer.themoviedb.org/reference/person-details
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function details(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}", $query);
    }

    /**
     * @description Get the recent changes for a person.
     * @link https://developer.themoviedb.org/reference/person-changes
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function changes(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/changes", $query);
    }

    /**
     * @description Get the combined movie and TV credits that belong to a person.
     * @link https://developer.themoviedb.org/reference/person-combined-credits
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function combinedCredits(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/combined_credits", $query);
    }

    /**
     * @description Get the external ID's that belong to a person.
     * @link https://developer.themoviedb.org/reference/person-details
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function externalIDs(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/external_ids", $query);
    }

    /**
     * @description Get the profile images that belong to a person.
     * @link https://developer.themoviedb.org/reference/person-images
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function images(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/images", $query);
    }

    /**
     * @description Get the newest created person. This is a live response and will continuously change.
     * @link https://developer.themoviedb.org/reference/person-latest-id
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function latest(?array $query): array
    {
        return $this->client->get('/person/latest', $query);
    }

    /**
     * @description Get the movie credits for a person.
     * @link https://developer.themoviedb.org/reference/person-movie-credits
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function movieCredits(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/movie_credits", $query);
    }

    /**
     * @description Get the TV credits for a person.
     * @link https://developer.themoviedb.org/reference/person-tv-credits
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function tvCredits(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/tv_credits", $query);
    }

    /**
     * @description Get the tagged images for a person.
     * @link https://developer.themoviedb.org/reference/person-tagged-images
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function taggedImages(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/tagged_images", $query);
    }

    /**
     * @description Get the translations that belong to a person.
     * @link https://developer.themoviedb.org/reference/translations
     *
     * @throws ConnectionException
     * @throws RequestException
     */
    public function translations(int $person_id, ?array $query): array
    {
        return $this->client->get("/person/{$person_id}/translations", $query);
    }
}
