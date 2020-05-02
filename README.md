# A tile for Laravel Dashboard that displays football standings of different leagues

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kayschima/laravel-dashboard-footballdata-standings-tile.svg?style=flat-square)](https://packagist.org/packages/kayschima/laravel-dashboard-footballdata-standings-tile)[![Total Downloads](https://img.shields.io/packagist/dt/kayschima/laravel-dashboard-footballdata-standings-tile.svg?style=flat-square)](https://packagist.org/packages/kayschima/laravel-dashboard-footballdata-standings-tile)

This tile can used on the [Laravel Dashboard](https://docs.spatie.be/laravel-dashboard) to display standings from www.football-data.org.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Installation
You can install the tile via composer:
```
composer require kayschima/laravel-dashboard-footballdata-standings-tile
```

In the dashboard config file, you must add this configuration in the tiles key.

Sign up at https://www.football-data.org/ to obtain `FOOTBALLDATA_API_KEY`.

Set `FOOTBALL_LEAGUE` to a league shortcut of the football-data.org service (e.g. `BL1` or `PL`).

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'footballstandings' => [
            'footballdata_api_key' => env('FOOTBALLDATA_API_KEY'),
            'football_league' => env('FOOTBALL_LEAGUE'),
        ]
    ],
];
```
In app\Console\Kernel.php you should schedule the `Kayschima\FootballStandingsTile\Commands\FetchFootballStandingsDataCommand` to run every minute.
```php
// in app/console/Kernel.php

use Kayschima\FootballStandingsTile\Commands\FetchFootballStandingsDataCommand;

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(FetchFootballStandingsDataCommand::class)->everyMinute();;
}      
```
## View
In your dashboard view you use the `livewire:football-standings-tile` component.

An optional `$highlight`-attribute to the tile triggers a simple highlighting of e.g. the local or favourite team. I expect this to be a common use case for the tile.

For simplicity, this commit uses the id of the team, specific to every competition -- `"4"` in this case for BVB @ 1. Bundesliga.
```html
<x-dashboard>
    <livewire:football-standings-tile position="a1" highlight="4" />
    <livewire:football-standings-tile position="b1" />
</x-dashboard>
```
#### Customizing the view
```bash
php artisan vendor:publish --provider="Kayschima\FootballStandingsTile\FootballStandingsTileServiceProvider" --tag="dashboard-football-standings-tile-views"
```