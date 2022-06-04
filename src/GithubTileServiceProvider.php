<?php

namespace Techenby\GithubTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class GithubTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchDataFromApiCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-github-tile'),
        ], 'dashboard-github-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-github-tile');

        Livewire::component('github-tile', GithubTileComponent::class);
    }
}
