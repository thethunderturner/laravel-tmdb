<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\HttpFactory;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Tmdb\Client;
use Tmdb\Event\BeforeRequestEvent;
use Tmdb\Event\Listener\Request\AcceptJsonRequestListener;
use Tmdb\Event\Listener\Request\ApiTokenRequestListener;
use Tmdb\Event\Listener\Request\ContentTypeJsonRequestListener;
use Tmdb\Event\Listener\Request\UserAgentRequestListener;
use Tmdb\Event\Listener\RequestListener;
use Tmdb\Event\RequestEvent;
use Tmdb\Token\Api\ApiToken;
use Tmdb\Token\Api\BearerToken;

class LaravelTmdbServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-tmdb.php', 'laravel-tmdb');

        $this->app->singleton(Client::class, function (Container $app): Client {
            $config = $app->make(ConfigRepository::class);
            $apiKey = $config->get('laravel-tmdb.api_key');
            $bearerToken = $config->get('laravel-tmdb.bearer_token');

            if (! is_string($bearerToken) || $bearerToken === '') {
                $bearerToken = null;
            }

            if (! is_string($apiKey) || $apiKey === '') {
                $apiKey = null;
            }

            if ($bearerToken === null && $apiKey === null) {
                throw new InvalidArgumentException('Set TMDB_API_KEY or TMDB_BEARER_TOKEN before resolving the TMDB client.');
            }

            $token = $bearerToken !== null ? new BearerToken($bearerToken) : new ApiToken($apiKey);
            $dispatcher = new EventDispatcher;
            $factory = new HttpFactory;

            $client = new Client([
                'api_token' => $token,
                'event_dispatcher' => ['adapter' => $dispatcher],
                'http' => [
                    'client' => $app->bound(ClientInterface::class)
                        ? $app->make(ClientInterface::class)
                        : new GuzzleClient,
                    'request_factory' => $factory,
                    'response_factory' => $factory,
                    'stream_factory' => $factory,
                    'uri_factory' => $factory,
                ],
            ]);

            $dispatcher->addListener(RequestEvent::class, new RequestListener($client->getHttpClient(), $dispatcher));
            $dispatcher->addListener(BeforeRequestEvent::class, new ApiTokenRequestListener($token));
            $dispatcher->addListener(BeforeRequestEvent::class, new AcceptJsonRequestListener);
            $dispatcher->addListener(BeforeRequestEvent::class, new ContentTypeJsonRequestListener);
            $dispatcher->addListener(BeforeRequestEvent::class, new UserAgentRequestListener);

            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/laravel-tmdb.php' => config_path('laravel-tmdb.php'),
        ], ['laravel-tmdb', 'laravel-tmdb-config']);
    }
}
