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
            $response = Http::withBasicAuth(config('dashboard.tiles.github.username'), config('dashboard.tiles.github.key'))
                ->get('https://api.github.com/repos/' . $repo . '/issues')
                ->json();
            list($pulls, $issues) = collect($response)->partition(fn($issue) => isset($issue['pull_request']));

            $data[$repo] = ['issues' => $issues->count(), 'pulls' => $pulls->count()];
        }

        GithubStore::make()->setData($data);

        $this->info('All done!');
    }
}
