<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'product_images';
    
    protected $fillable = [
        'product_id',
        'url',
        'sort_order',
    ];

}
