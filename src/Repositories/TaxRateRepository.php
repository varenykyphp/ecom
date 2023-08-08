<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\TaxRate;
use Varenyky\Repositories\Repository;

class TaxRateRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(TaxRate $model)
    {
        $this->model = $model;
    }
}