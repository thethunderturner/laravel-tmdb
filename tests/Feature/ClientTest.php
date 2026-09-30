<?php

declare(strict_types=1);

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use LaravelTmdb\LaravelTmdb\LaravelTmdb;
use LaravelTmdb\LaravelTmdb\LaravelTmdbServiceProvider;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Tmdb\Client;

it('merges and publishes its configuration', function () {
    expect(config('laravel-tmdb.api_key'))->toBeNull()
        ->and(config('laravel-tmdb.bearer_token'))->toBeNull()
        ->and(array_map('realpath', array_keys(LaravelTmdbServiceProvider::pathsToPublish(
            LaravelTmdbServiceProvider::class,
            'laravel-tmdb-config',
        ))))->toContain(realpath(__DIR__.'/../../config/laravel-tmdb.php'));
});

it('resolves the upstream client as a singleton and through the facade', function () {
    config()->set('laravel-tmdb.api_key', 'test-key');

    expect(app(Client::class))->toBeInstanceOf(Client::class)
        ->toBe(app(Client::class))
        ->toBe(LaravelTmdb::getFacadeRoot());
});

it('requires credentials when the client is resolved', function () {
    app(Client::class);
})->throws(InvalidArgumentException::class, 'TMDB_API_KEY or TMDB_BEARER_TOKEN');

it('uses the configured API key for upstream requests', function () {
    config()->set('laravel-tmdb.api_key', 'test-key');

    $requests = [];
    fakeTmdbHttpClient($requests);
    $movie = app(Client::class)->getMoviesApi()->getMovie(550);

    expect($movie['id'])->toBe(550)
        ->and($requests)->toHaveCount(1)
        ->and($requests[0]['request']->getUri()->getPath())->toBe('/3/movie/550')
        ->and($requests[0]['request']->getUri()->getQuery())->toContain('api_key=test-key')
        ->and($requests[0]['request']->getHeaderLine('Accept'))->toBe('application/json; charset=utf-8');
});

it('prefers a bearer token when both credentials are configured', function () {
    config()->set('laravel-tmdb.api_key', 'test-key');
    config()->set('laravel-tmdb.bearer_token', 'test-bearer');

    $requests = [];
    fakeTmdbHttpClient($requests);
    app(Client::class)->getMoviesApi()->getMovie(550);

    expect($requests[0]['request']->getHeaderLine('Authorization'))->toBe('Bearer test-bearer')
        ->and($requests[0]['request']->getUri()->getQuery())->not->toContain('api_key=');
});

/** @param array<int, array{request: RequestInterface, options: array<mixed>}> $requests */
function fakeTmdbHttpClient(array &$requests): void
{
    $handler = HandlerStack::create(new MockHandler([
        new Response(200, ['Content-Type' => 'application/json'], '{"id":550,"title":"Fight Club"}'),
    ]));
    $handler->push(Middleware::history($requests));

    app()->instance(ClientInterface::class, new HttpClient(['handler' => $handler]));
}
