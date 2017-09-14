<?php

namespace Nba\Http\Controllers;

use CartHook\Entities\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlayersController extends Controller
{
    private $entity;

    public function __construct(Player $player)
    {
        $this->entity = $player;
    }

    public function index(Request $request) {
        $players = $this->entity->paginate($request->perPage ?? 15, $request->page ?? 1)->withPath($request->url());

        return view('players', ['players' => $players]);
    }

    public function show($id) {

        $player = $this->entity->find($id);

        $playerDetails = Cache::remember("player-info-$player->playerId", 20, function () use ($player) {
            return $player->stats()->playerInfo();
        });

        $careerStats =  Cache::remember("player-stats-$player->playerId", 20, function () use ($player) {
            return $player->stats()->career();
        });

        return view('player-info', [
            'player' => $player,
            'playerDetails' => $playerDetails,
            'careerStats' => $careerStats
        ]);
    }
}
