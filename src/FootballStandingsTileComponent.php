<?php

namespace Kayschima\FootballStandingsTile;

use Livewire\Component;

class FootballStandingsTileComponent extends Component
{
    /** @var string */
    public $position;

    /** @var integer */
    public $highlight;

    public function mount(string $position, int $highlight = null)
    {
        $this->position = $position;
        $this->highlight = $highlight;
    }

    public function render()
    {
        $footballStandingsStore = FootballStandingsStore::make();

        return view('dashboard-football-standings-tile::tile', [
            'standings' => $footballStandingsStore->footballStandings(),
            'highlight' => $this->highlight,
        ]);
    }
}
