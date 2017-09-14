<?php

namespace Tests\Browser;

use Tests\Browser\Pages\PlayersPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlayersControllerTest extends DuskTestCase
{
    /** @test */
    public function it_displays_players_in_a_table()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new PlayersPage)
                    ->assertSee('Players');
        });
    }
}
