<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class TMDBClient
{
    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function get(string $endpoint, ?array $query = []): array
    {
        return Http::withToken(config('laravel-tmdb.bearer_token', ''))
            ->baseUrl('https://api.themoviedb.org/3')
            ->get($endpoint, $query ?? [])
            ->throw()
            ->json();
    }
}
