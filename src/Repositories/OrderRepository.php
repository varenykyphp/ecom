<?php

namespace VarenykyECom\Repositories;

use Varenyky\Repositories\Repository;
use VarenykyECom\Models\Order;

class OrderRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }
}