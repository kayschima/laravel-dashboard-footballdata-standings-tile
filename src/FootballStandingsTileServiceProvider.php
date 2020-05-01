<?php

namespace Kayschima\FootballStandingsTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Kayschima\FootballStandingsTile\Commands\FetchFootballStandingsDataCommand;

class FootballStandingsTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('football-standings-tile', FootballStandingsTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchFootballStandingsDataCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-football-standings-tile'),
        ], 'dashboard-football-standings-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-football-standings-tile');
    }
}
