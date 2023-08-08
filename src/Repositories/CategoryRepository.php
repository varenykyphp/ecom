<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\Category;
use Varenyky\Repositories\Repository;

class CategoryRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}