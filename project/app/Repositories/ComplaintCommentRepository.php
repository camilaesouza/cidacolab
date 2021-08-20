<?php

namespace App\Repositories;

use App\Models\ComplaintComment;
use App\Traits\Newable;

class ComplaintCommentRepository extends Repository
{
    use Newable;

    protected function getClass()
    {
        return ComplaintComment::class;
    }
}
