<div align="center">
    <h1>Laravel TMDB</h1>
</div>

<p align="center">
    <a href="https://packagist.org/packages/thethunderturner/laravel-tmdb"><img src="https://img.shields.io/packagist/v/thethunderturner/laravel-tmdb.svg?style=flat-square" alt="Packagist"></a>
    <a href="https://packagist.org/packages/thethunderturner/laravel-tmdb"><img src="https://img.shields.io/packagist/php-v/thethunderturner/laravel-tmdb.svg?style=flat-square" alt="PHP from Packagist"></a>
    <a href="https://packagist.org/packages/thethunderturner/laravel-tmdb"><img src="https://badge.laravel.cloud/badge/thethunderturner/laravel-tmdb?style=flat" alt="Laravel versions"></a>
    <a href="https://github.com/thethunderturner/laravel-tmdb/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/thethunderturner/laravel-tmdb/tests.yml?branch=main&label=Tests&style=flat-square"></a>
    <a href="https://packagist.org/packages/thethunderturner/laravel-tmdb"><img src="https://img.shields.io/packagist/dt/thethunderturner/laravel-tmdb.svg?style=flat-square" alt="Total Downloads"></a>
</p>

Laravel integration for [TMDB API]([https://github.com/php-tmdb/api](https://developer.themoviedb.org/reference/getting-started)).

## Installation

You can install the package via Composer:

```bash
composer require thethunderturner/laravel-tmdb
```

Set either credential in your application's `.env` file:

```dotenv
TMDB_BEARER_TOKEN=your-read-access-token
```

You may publish the package configuration:

```bash
php artisan vendor:publish --tag="laravel-tmdb"
```

Or, you may publish each resource individually:

### Publishing the Configuration File

```bash
php artisan vendor:publish --tag="laravel-tmdb-config"
```

## Usage

The service provider is discovered automatically. Inject the upstream client wherever you need TMDB data:

```php
use Tmdb\Client;

final class MovieController
{
    public function show(Client $tmdb, int $id): array
    {
        return $tmdb->getMoviesApi()->getMovie($id);
    }
}
```

You can also call `app(\Tmdb\Client::class)` or use the `LaravelTmdb\LaravelTmdb\LaravelTmdb` facade. The package registers the request listeners needed by `php-tmdb/api` and resolves one shared client per Laravel application. To replace its PSR-18 HTTP transport, bind `Psr\Http\Client\ClientInterface` before resolving the TMDB client.

The package's tests use an in memory HTTP response, so `composer test:unit` needs no TMDB credentials or network access. API calls and response models remain the responsibility of [`php-tmdb/api`](https://github.com/php-tmdb/api).

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Thank you for considering contributing to Laravel TMDB! Please review our [contributing guide](.github/CONTRIBUTING.md) to get started.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Matthew Biskas](https://github.com/thethunderturner)
- [All Contributors](../../contributors)

## License

Laravel TMDB is open-sourced software licensed under the [MIT license](LICENSE.md).
