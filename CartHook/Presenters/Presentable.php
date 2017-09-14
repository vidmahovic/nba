<?php

namespace CartHook\Presenters;

trait Presentable
{
    protected $instance;

    public function present()
    {
        if ( ! $this->presenter or ! class_exists($this->presenter))
        {
            throw new \LogicException('Please set the $presenter property to your presenter path.');
        }
        if ( ! $this->instance)
        {
            $this->instance = new $this->presenter($this);
        }
        return $this->instance;
    }
}
