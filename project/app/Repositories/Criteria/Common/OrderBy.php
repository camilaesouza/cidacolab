<?php
namespace App\Repositories\Criteria\Common;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Repository;

class OrderBy extends Criteria
{
    private $order;
    private $column;

    public function __construct($column, $order)
    {
        $this->order = $order;
        $this->column = $column;
    }

    public function apply($queryBuilder, Repository $repository)
    {
        return $queryBuilder->orderBy($this->column, $this->order);
    }
}
