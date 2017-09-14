<?php

namespace Tests;

use CartHook\Entities\Resources\Resource;

/**
 * Class TestResource
 *
 * @package \Tests
 */
class TestResource extends Resource
{
    private $data = [];

    public function fetch(string $source, array $options = []): array
    {
        return $this->data;
    }

    public function apply(array $data) : Resource {
        $this->data = $data;
    }
}
