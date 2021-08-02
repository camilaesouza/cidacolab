<?php
namespace App\Repositories;

use App\Models\Complaint;

class ComplaintRepository extends Repository
{
    protected function getClass()
    {
        return Complaint::class;
    }
}
