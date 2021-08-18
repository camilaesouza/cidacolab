<?php

namespace App\Repositories;

use App\Helpers\SelectOption;
use App\Models\City;
use App\Traits\Newable;

class CityRepository extends Repository
{
    use Newable;

    protected function getClass()
    {
        return City::class;
    }

    public function toSelect()
    {
        $this->makeModel();
        $this->applyCriteria();

        $cities = $this->model->orderBy('name', 'asc')->get();

        return $cities->map(function ($city) {
            return new SelectOption($city->id, $city->name);
        })->toArray();
    }
}
