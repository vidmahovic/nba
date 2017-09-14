<?php

namespace CartHook\Transformers;

use Carbon\Carbon;

/**
 * Class PlayerInfoTransformer
 *
 * @package \CartHook\Transformers
 */
class PlayerInfoTransformer extends NbaApiTransformer
{

    public function transform(array $item): array
    {
        $this->item = $item;

        return [
            'date_of_birth' => new Carbon($this->parseValueByKey('BIRTHDATE')),
            'school_name' => $this->parseValueByKey('SCHOOL'),
            'origin' => $this->parseValueByKey('COUNTRY'),
            'height' => $this->parseValueByKey('HEIGHT'),
            'weight' => $this->parseValueByKey('WEIGHT'),
            'position' => $this->parseValueByKey('POSITION'),
            'roster_status' => $this->parseValueByKey('ROSTERSTATUS'),
            'team_id' => $this->parseValueByKey('TEAM_ID'),
            'team_name' => $this->parseValueByKey('TEAM_NAME'),
        ];
    }
}
