# A GitHub Issues & Pull Requests tile for the Laravel Dashboard

[![Latest Version on Packagist](https://img.shields.io/packagist/v/techenby/laravel-dashboard-github-tile.svg?style=flat-square)](https://packagist.org/packages/techenby/laravel-dashboard-github-tile)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/techenby/laravel-dashboard-github-tile/run-tests?label=tests)](https://github.com/techenby/laravel-dashboard-github-tile/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/techenby/laravel-dashboard-github-tile.svg?style=flat-square)](https://packagist.org/packages/techenby/laravel-dashboard-github-tile)

A friendly explanation of what your tile does.

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

## Installation

You can install the package via composer:

```bash
composer require techenby/laravel-dashboard-github-tile
```

Get a Personal API Token from GitHub and add it to your `.env` file.

```
GITHUB_KEY=XXX
```

In the dashboard config file, you must add this configuration in the `tiles` key. The `repos` should contain any repo that you want to disply.

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'github' => [
            'repos' => [
                'techenby/laravel-dashboard-github-tile',
                'techenby/radnight',
            ],
            'key' => env('GITHUB_KEY'),
            'username' => 'techenby', // use your GitHub Username
        ],
    ],
];
```

In app\Console\Kernel.php you should schedule the Solitweb\WeatherForecastTile\FetchDataFromApiCommand to run however frequently you feel is necessary.

```php
// in app/console/Kernel.php
protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(Techenby\GithubTile\FetchDataFromApiCommand::class)->daily();
}
```

## Usage

In your dashboard view you use the `livewire:github-tile` component.

```html
<x-dashboard>
    <livewire:github-tile position="e1" />
</x-dashboard>
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email hi@andymnewhouse.me instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
