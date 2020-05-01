<?php

namespace Kayschima\FootballStandingsTile\Commands;

use Illuminate\Console\Command;
use Kayschima\FootballStandingsTile\Services\FootballStandings;
use Kayschima\FootballStandingsTile\FootballStandingsStore;

class FetchFootballStandingsDataCommand extends Command
{
    protected $signature = 'dashboard:fetch-football-standings-data';

    protected $description = 'Fetch football standings data';

    public function handle()
    {
        $FootballStandingsReport = FootballStandings::getFootballStandings();

        FootballStandingsStore::make()->setFootballStandingsReport($FootballStandingsReport);
        $this->info('All done!');
    }
}
