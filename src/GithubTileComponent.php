<?php

namespace Techenby\GithubTile;

use Livewire\Component;

class GithubTileComponent extends Component
{
    public $position;
    public $title;

    public function mount(string $position, string $title)
    {
        $this->position = $position;
        $this->title = $title;
    }

    public function render()
    {
        return view('dashboard-github-tile::tile', [
            'repos' => $this->filteredRepos,
        ]);
    }

    public function getFilteredReposProperty()
    {
        return collect(GithubStore::make()->getData())
            ->filter(function($repo) {
                return $repo['issues'] > 0 || $repo['pulls'] > 0;
            })
            ->sortByDesc('issues');
    }
}
