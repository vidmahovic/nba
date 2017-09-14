<?php

namespace CartHook\Entities;
use CartHook\Entities\Resources\Resource;
use CartHook\Presenters\Presentable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;

/**
 * Class Entity
 *
 * @package \CartHook\Entities
 */
abstract class Entity implements Arrayable, Jsonable
{
    use Presentable;

    protected $resource;

    protected $presenter;
    protected $attributes;
    protected $primaryKey = 'id';


    public function __construct(array $attributes = [], Resource $resource)
    {
        $this->attributes = $attributes;
        $this->resource = $resource;
    }

    public function getResource() : Resource {
        return $this->resource;
    }

    public function getKey() {
        return $this->attributes[$this->primaryKey] ?? null;
    }

    public function newCollection(array $models = []) : Collection
    {
        return new Collection($models);
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->attributes)) {

            return $this->attributes[$name];

        }

        return;
    }

    protected static function resolve(array $data = []) {
        return app(static::class, ['attributes' => $data]);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

}
