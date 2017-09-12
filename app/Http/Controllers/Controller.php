<?php

namespace Nba\Http\Controllers;

use CartHook\Api\GlorifiesResponses;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, GlorifiesResponses;

    protected function paginationRequested(Request $request) {
        return $request->has('perPage') && $request->has('page');
    }
}
