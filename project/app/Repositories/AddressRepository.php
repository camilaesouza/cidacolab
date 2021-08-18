<?php

namespace App\Repositories;

use App\Traits\Newable;
use App\Models\Address;

class AddressRepository extends Repository
{
    use Newable;

    protected function getClass()
    {
        return Address::class;
    }

    private function handleState($data)
    {
        if (isset($data['state'])) {
            $state = (new StatesRepository())->findBy('abbr', $data['state'])->first();
            $data['state_id'] = $state->id;
        }

        return array_except($data, ['city', 'state', 'complete_address']);
    }

    public function create($data)
    {
        $data = $this->handleState($data);
        return parent::create($data);
    }
}
