<?php
namespace App\Repositories;

use App\Models\Complaint;
use App\Traits\Newable;

class ComplaintRepository extends Repository
{
    use Newable;

    protected function getClass()
    {
        return Complaint::class;
    }
}
