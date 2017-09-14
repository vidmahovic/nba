<?php

namespace CartHook\Entities;

use CartHook\Presenters\PlayerPresenter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class Player extends FileEntity
{
    protected $presenter = PlayerPresenter::class;
    protected $primaryKey =  'playerId';


    public function find($id) : ?Player
    {
        $player = $this->filterByKey($this->resource->fetch($this->getFile()), $this->primaryKey, $id);

        return count($player) ? static::resolve($player) : null;
    }

    public function all() : Collection
    {
        return collect(array_map(function($player) {
            return static::resolve($player);
        }, $this->resource->fetch($this->getFile())));
    }

    public function paginate(int $perPage = 15, int $currentPage = 1): Paginator {
        return new Paginator($this->all()->slice($perPage * ($currentPage - 1)), $perPage, $currentPage);
    }

    public function stats() : Stats {
        return app(Stats::class)->forPlayer($this->getKey());
    }





    protected function getFile(): string
    {
        return database_path('files/players.json');
    }

    public function getInfo() {
        $this->stats()->playerInfo();
    }

    public function currentTeam()
    {
        return app(Team::class)->find($this->teamId) ?? app(Team::class);
    }

    private function filterByKey(array $results, $keyName, $keyVal) {
        return array_first(array_filter($results, function($result) use ($keyName, $keyVal) {
            return array_key_exists($keyName, $result) ? $result[$keyName] == $keyVal : false;
        }));
    }

}
