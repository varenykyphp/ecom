<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\Brand;
use Varenyky\Repositories\Repository;

class BrandRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }
}