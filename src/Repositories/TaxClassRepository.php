<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\TaxClass;
use Varenyky\Repositories\Repository;

class TaxClassRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(TaxClass $model)
    {
        $this->model = $model;
    }
}