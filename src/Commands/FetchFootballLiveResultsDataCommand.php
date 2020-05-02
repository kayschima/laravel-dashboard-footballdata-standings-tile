<?php

namespace Kayschima\FootballStandingsTile\Commands;

use Illuminate\Console\Command;
use Kayschima\FootballStandingsTile\FootballLiveResultsStore;
use Kayschima\FootballStandingsTile\Services\FootballLiveResults;

class FetchFootballLiveResultsDataCommand extends Command
{
    protected $signature = 'dashboard:fetch-football-liveresults-data';

    protected $description = 'Fetch football live results data';

    public function handle()
    {
        $FootballLiveResultsReport = FootballLiveResults::getFootballLiveResults();

        FootballLiveResultsStore::make()->setFootballLiveResultsReport($FootballLiveResultsReport);
        $this->info('All done!');
    }
}
