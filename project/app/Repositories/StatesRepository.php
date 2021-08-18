<?php

namespace App\Repositories;

use App\Models\State;
use App\Traits\Newable;

class StatesRepository extends Repository
{
    use Newable;

    protected function getClass()
    {
        return State::class;
    }
}
