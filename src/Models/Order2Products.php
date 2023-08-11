<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id', 
        'quantity', 
        'price',
        'tax', 
        'total',
        'status',
        'tax_rate_id',
    ];

}