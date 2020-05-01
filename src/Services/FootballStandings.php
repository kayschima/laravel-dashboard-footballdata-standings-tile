<?php

namespace Kayschima\FootballStandingsTile\Services;

use Illuminate\Support\Facades\Http;

class FootballStandings
{
    public static function getFootballStandings(): array
    {
        $url = 'http://api.football-data.org/v2/competitions/'.
                config('dashboard.tiles.footballstandings.football_league','BL1') . '/standings';

        return Http::withHeaders([
            'X-Auth-Token' => config('dashboard.tiles.footballstandings.footballdata_api_key') ,
        ])->get($url)->json();
    }
}
