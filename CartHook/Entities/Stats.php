<?php

namespace CartHook\Entities;

use CartHook\Transformers\PlayerCareerTransformer;
use CartHook\Transformers\PlayerInfoTransformer;

/**
 * Class Stats
 *
 * @package \CartHook\Entities
 */
class Stats extends ApiEntity
{
    public function forPlayer($playerId) : Stats {
        $this->requestParams['player_id'] = $playerId;
        return $this;
    }

    public function playerInfo() : array
    {
        $transformer = new PlayerInfoTransformer;
        $data = $transformer->transform($this->resource->fetch($this->getUrl('/commonplayerinfo'), [
            'params' => [
                'PlayerID' => $this->requestParams['player_id'] ?? '',
                'SeasonType' => $this->requestParams['season_type'] ?? 'Regular%20Season',
                'LeagueID' => $this->requestParams['league_id'] ?? '00',
                'PerMode' => $this->requestParams['per_mode'] ?? 'Totals'
            ]
        ]));

        return $data;
        //return app(static::class, ['attributes' => $data]);
    }

    public function career() : array
    {
        $transformer = new PlayerCareerTransformer;
        $data = $transformer->transform($this->resource->fetch($this->getUrl('/playerprofilev2'), [
            'params' => [
                'PlayerID' => $this->requestParams['player_id'] ?? '',
                'SeasonType' => $this->requestParams['season_type'] ?? 'Regular%20Season',
                'LeagueID' => $this->requestParams['league_id'] ?? '00',
                'PerMode' => $this->requestParams['per_mode'] ?? 'Totals'
            ]
        ]));

        return $data;
        //return app(static::class, ['attributes' => $data]);
    }


    protected function getUrl($endppint = ''): string
    {
        return 'http://stats.nba.com/stats' . $endppint;
    }
}
