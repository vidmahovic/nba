<?php

namespace CartHook\Entities;

use CartHook\Presenters\TeamPresenter;

/**
 * Class Team
 *
 * @package \CartHook\Entities
 */
class Team extends FileEntity
{
    protected $presenter = TeamPresenter::class;
    protected $primaryKey = 'teamId';

    public function find($id) {
        $team = $this->filterByKey($this->resource->fetch($this->getFile()), $this->primaryKey, $id);
        return count($team) ? static::resolve($team) : null;
    }

    protected function getFile(): string
    {
        return database_path('files/teams.json');
    }

    private function filterByKey(array $results, $keyName, $keyVal) {
        return array_first(array_filter($results, function($result) use ($keyName, $keyVal) {
            return array_key_exists($keyName, $result) ? $result[$keyName] == $keyVal : false;
        }));
    }
}
