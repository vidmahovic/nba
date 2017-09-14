<?php

namespace Tests\Feature;

use CartHook\Entities\Player;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayersControllerTest extends TestCase
{

    /** @test */
    public function it_fetches_data_and_presents_them_as_a_collection() {
        $data = factory(Player::class, 10)->make();

        $response = $this->get('api/players?perPage=10&page=3');
        dd($response->json());

    }

}
