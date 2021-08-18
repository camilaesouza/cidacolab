<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Criteria\Common\OrderBy;
use App\Repositories\StatesRepository;

class StateCityController extends Controller
{
    public function getStatesJson()
    {
        $states = StatesRepository::new()
            ->pushCriteria(new OrderBy('name', 'asc'))
            ->all();

        return response()->json($states, 200);
    }

    public function getCitiesJsonFor($stateUf)
    {
        $state = StatesRepository::new()
            ->findBy('abbr', mb_strtoupper($stateUf));

        $cities = $state->first()->cities ?? [];
        return response()->json($cities);
    }
}
