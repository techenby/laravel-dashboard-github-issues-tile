<?php

namespace Techenby\GithubTile;

use Spatie\Dashboard\Models\Tile;

class GithubStore
{
    private Tile $tile;

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('github');
    }

    public static function make()
    {
        return new static();
    }

    public function setData(array $data): self
    {
        $this->tile->putData('repos', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('repos') ?? [];
    }
}
