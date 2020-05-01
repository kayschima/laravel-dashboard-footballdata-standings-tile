# A tile for Laravel Dashboard that displays football standings of different leagues

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kayschima/laravel-dashboard-footballdata-standings-tile.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-dashboard-time-weather-tile)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kayschima/laravel-dashboard-footballdata-standings-tile/run-tests?label=tests)](https://github.com/spatie/laravel-dashboard-time-weather-tile/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/kayschima/laravel-dashboard-footballdata-standings-tile.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-dashboard-time-weather-tile)

This tile can used on the [Laravel Dashboard](https://docs.spatie.be/laravel-dashboard) to display standings from football-data.org.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

##Installation
You can install the tile via composer:
```
composer require kayschima/laravel-dashboard-footballdata-standings-tile
```

In the dashboard config file, you must add this configuration in the tiles key.

Sign up at https://football-data.org/ to obtain `FOOTBALLDATA_API_KEY`.

Set `FOOTBALL_LEAGUE` to a league shortcut of the football-data.org service (e.g. `BL1` or `PL`).

```
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
```
// in app/console/Kernel.php

use Kayschima\FootballStandingsTile\Commands\FetchFootballStandingsDataCommand;

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(FetchFootballStandingsDataCommand::class)->everyMinute();;
}      
```
##View
In your dashboard view you use the `livewire:football-standings-tile` component.
```
<x-dashboard>
    <livewire:football-standings-tile position="a1" />
</x-dashboard>

```
####Customizing the view
```
php artisan vendor:publish --provider="Kayschima\FootballStandingsTile\FootballStandingsTileServiceProvider" --tag="dashboard-football-standings-tile-views"
```