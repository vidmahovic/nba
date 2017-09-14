<?php

namespace CartHook\Entities;

/**
 * Class ApiEntity
 *
 * @package \Nba\CartHook
 */
abstract class ApiEntity extends Entity
{
    protected $requestParams = [];

    abstract protected function getUrl() : string;
}
