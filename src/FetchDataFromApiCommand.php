<?php

namespace Techenby\GithubTile;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchDataFromApiCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-github-api';

    protected $description = 'Fetch data for tile';

    public function handle()
    {
        $this->info('Fetching Github stats...');

        $repos = config('dashboard.tiles.github.repos');

        $data = [];
        foreach ($repos as $repo) {
            $issues = Http::withBasicAuth(config('dashboard.tiles.github.username'), config('dashboard.tiles.github.key'))
                ->get('https://api.github.com/repos/' . $repo . '/issues')
                ->json();
            $pulls = Http::withBasicAuth(config('dashboard.tiles.github.username'), config('dashboard.tiles.github.key'))
                ->get('https://api.github.com/repos/' . $repo . '/pulls')
                ->json();

            $data[$repo] = ['issues' => count($issues), 'pulls' => count($pulls)];
        }

        GithubStore::make()->setData($data);

        $this->info('All done!');
    }
}
