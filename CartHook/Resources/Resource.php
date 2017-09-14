<?php

namespace CartHook\Entities\Resources;

abstract class Resource
{
    protected function parseJson(string $content) : array {

        $json = json_decode($content, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            return $json;
        }

        throw new \RuntimeException("Invalid JSON string. Details: " . json_last_error_msg());
    }



    abstract public function fetch(string $source, array $options = []) : array;
}
