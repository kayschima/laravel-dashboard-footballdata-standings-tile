<?php

namespace Kayschima\FootballStandingsTile;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Dashboard\Models\Tile;

class FootballStandingsStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('footballstandings');
    }


    public function footballStandings(): array
    {
        return $this->tile->getData('footballStandings') ?? [];
    }

    public function setFootballStandingsReport(array $FootballStandingsReport): self
    {
        $this->tile->putData('footballStandings', $FootballStandingsReport);

        return $this;
    }


}
