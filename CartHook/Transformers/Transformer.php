<?php

namespace CartHook\Transformers;

/**
 * Class Transformer
 *
 * @package \CartHook\Transformers
 */
abstract class Transformer
{
    public function transformCollection(array $collection) : array {
        return array_map(function($item) {
            $this->transform($item);
        }, $collection);
    }

    abstract public function transform(array $item) : array;
}
