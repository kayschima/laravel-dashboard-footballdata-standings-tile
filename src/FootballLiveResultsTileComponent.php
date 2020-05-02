<?php

namespace Kayschima\FootballStandingsTile;

use Livewire\Component;

/**
 * Class FootballLiveResultsTileComponent
 * @package Kayschima\FootballStandingsTile
 */
class FootballLiveResultsTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position, int $highlight = null)
    {
        $this->position = $position;
    }

    public function render()
    {
        $FootballLiveResultsStore = FootballLiveResultsStore::make();

        return view('dashboard-football-standings-tile::tile-liveresults', [
            'liveresults' => $FootballLiveResultsStore->footballLiveResults(),
        ]);
    }
}
