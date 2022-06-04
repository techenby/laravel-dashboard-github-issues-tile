<?php

namespace Techenby\GithubTile;

use Livewire\Component;

class GithubTileComponent extends Component
{
    public $position;
    public $title;
    public $refreshInSeconds;

    public function mount(string $position, string $title, int $refreshInSeconds = null)
    {
        $this->position = $position;
        $this->title = $title;
        $this->refreshInSeconds;
    }

    public function render()
    {
        return view('dashboard-github-tile::tile', [
            'repos' => $this->filteredRepos,
            'refreshIntervalInSeconds' => $this->refreshInSeconds ?? config('dashboard.tiles.github.refresh_interval_in_seconds') ?? 60,
        ]);
    }

    public function getFilteredReposProperty()
    {
        return collect(GithubStore::make()->getData())
            ->filter(function ($repo) {
                return $repo['issues'] > 0 || $repo['pulls'] > 0;
            })
            ->sortByDesc('total');
    }
}
