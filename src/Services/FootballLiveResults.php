<?php

namespace Kayschima\FootballStandingsTile\Services;

use Illuminate\Support\Facades\Http;

class FootballLiveResults
{
    public static function getFootballLiveResults(): array
    {
        $url = 'http://api.football-data.org/v2/matches?status=LIVE';

        return Http::withHeaders([
            'X-Auth-Token' => config('dashboard.tiles.footballstandings.footballdata_api_key') ,
        ])->get($url)->json();
    }
}
