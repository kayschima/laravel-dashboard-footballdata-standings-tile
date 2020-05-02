<?php

namespace Kayschima\FootballStandingsTile;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Dashboard\Models\Tile;

class FootballLiveResultsStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('football-liveresults');
    }


    public function footballLiveResults(): array
    {
        return $this->tile->getData('football-liveresults') ?? [];
    }

    public function setFootballLiveResultsReport(array $FootballLiveResultsReport): self
    {
        $this->tile->putData('football-liveresults', $FootballLiveResultsReport);

        return $this;
    }


}
