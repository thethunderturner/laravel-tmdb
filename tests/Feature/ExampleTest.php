<?php

declare(strict_types=1);

use LaravelTmdb\LaravelTmdb\LaravelTmdb;

it('resolves the singleton', function () {
    expect(app(LaravelTmdb::class))->toBeInstanceOf(LaravelTmdb::class);
});

it('returns the same instance from the container', function () {
    expect(app(LaravelTmdb::class))->toBe(app(LaravelTmdb::class));
});

it('merges the package config', function () {
    expect(config('laravel-tmdb.placeholder'))->toBe('default');
});
