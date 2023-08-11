<?php

namespace VarenykyECom\Repositories;

use VarenykyECom\Models\Image;
use Varenyky\Repositories\Repository;

class ImageRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Image $model)
    {
        $this->model = $model;
    }
}