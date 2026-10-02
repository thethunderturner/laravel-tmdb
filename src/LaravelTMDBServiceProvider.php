<?php

namespace LaravelTmdb\LaravelTmdb;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class LaravelTMDBServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-tmdb.php', 'laravel-tmdb');

        $this->app->singleton(TMDBClient::class, function (Container $app): TMDBClient {
            $config = $app->make('config');
            $bearerToken = $config->get('laravel-tmdb.bearer_token');

            if (! is_string($bearerToken) || $bearerToken === '') {
                $bearerToken = null;
            }

            if (! $bearerToken) {
                throw new InvalidArgumentException('Set TMDB_BEARER_TOKEN before accessing the TMDB client.');
            }

            return new TMDBClient;
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
