<?php

namespace CartHook\Transformers;

/**
 * Class PlayerCareerTransformer
 *
 * @package \CartHook\Transformers
 */
class PlayerCareerTransformer extends NbaApiTransformer
{

    public function transform(array $item): array
    {
        $this->item = $item;

        return [
            'points' => $this->parseCareerTotalStats('PTS'),
            'rebounds' => $this->parseCareerTotalStats('REB'),
            'blocks' => $this->parseCareerTotalStats('BLK'),
            'assists' => $this->parseCareerTotalStats('AST'),
            'games_played' => $this->parseCareerTotalStats('GP'),
            'steals' => $this->parseCareerTotalStats('STL'),
            'efficiency_rating' => $this->parseCareerTotalStats('EFF'),
            'fouls' => $this->parseCareerTotalStats('PF')
        ];
    }

    private function parseCareerTotalStats($key) {
        return $this->parseValueByKey($key, 1);
    }
}
