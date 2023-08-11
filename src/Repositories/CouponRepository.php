<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\Coupon;
use Varenyky\Repositories\Repository;

class CouponRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     *
     * @param NameModel $model
     */
    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }

}