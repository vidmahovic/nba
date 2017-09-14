<?php

namespace CartHook\Presenters;

/**
 * Class PlayerPresenter
 *
 * @package \CartHook\Presenters
 */
class PlayerPresenter extends Presenter
{
    public function name() : string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function id() : string {
        return $this->playerId;
    }

}
