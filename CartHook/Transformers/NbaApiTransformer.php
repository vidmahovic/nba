<?php

namespace CartHook\Transformers;

/**
 * Class NbaApiTransformer
 *
 * @package \CartHook\Transformers
 */
abstract class NbaApiTransformer extends Transformer
{
    protected $item;

    protected function parseValueByKey($key, $index = 0) {
        $attributes = $this->item['resultSets'][$index]['headers'];

        $valueIndex = array_search($key, $attributes);

        if($valueIndex !== false) {
            return $this->item['resultSets'][0]['rowSet'][0][$valueIndex];
        }

        return null;
    }
}
