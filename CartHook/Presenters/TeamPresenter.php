<?php

namespace CartHook\Presenters;

/**
 * Class TeamPresenter
 *
 * @package \CartHook\Presenters
 */
class TeamPresenter extends Presenter
{
    public function name() : string {
        return $this->entity->teamName ?? 'Unknown';
    }

    public function nameWithAbbr() : string {
        return $this->name() . " (" . ($this->entity->abbreviation ?? 'UNK') . ")";
    }

    public function location() {
        return $this->entity->location ?? 'Unknown';
    }


}
