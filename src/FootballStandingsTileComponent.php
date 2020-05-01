<?php

namespace Kayschima\FootballStandingsTile;

use Livewire\Component;

class FootballStandingsTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        $footballStandingsStore = FootballStandingsStore::make();

        return view('dashboard-football-standings-tile::tile', [
            'standings' => $footballStandingsStore->footballStandings()
        ]);
    }
}
