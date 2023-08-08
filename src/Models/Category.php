<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent'
    ];


    function parentName($parent_id)
    {
        $category = Category::find($parent_id);

        if ($category) {
            return $category->name;
        } else {
            return '';
        }
    }
}
