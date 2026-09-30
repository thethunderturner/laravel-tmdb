<?php

declare(strict_types=1);

namespace LaravelTmdb\LaravelTmdb;

use Illuminate\Support\ServiceProvider;

class LaravelTmdbServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-tmdb.php', 'laravel-tmdb');

        $this->app->singleton(LaravelTmdb::class);
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
