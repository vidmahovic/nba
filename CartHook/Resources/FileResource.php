<?php

namespace CartHook\Entities\Resources;

use Nahid\JsonQ\Jsonq;

/**
 * Class FileResource
 *
 * @package \CartHook\Entities\Resources
 */
class FileResource extends Resource
{

    const PARAMS_OPT = 'params';

    public function fetch(string $source, array $options = []): array
    {
        $content = file_get_contents($source);

        if($content) {
            return $this->parseJson($content);
        }

        throw new ResourceException("File $source does not exist.");
    }

    protected function parseParams(array $options) {
        return array_key_exists(static::PARAMS_OPT, $options) ? $options[static::PARAMS_OPT] : [];
    }

    private function isPath(string $source) {
        return strpos($source, '/') !== false;
    }



}
