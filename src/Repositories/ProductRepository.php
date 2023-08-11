<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\Product;
use Varenyky\Repositories\Repository;

class ProductRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}