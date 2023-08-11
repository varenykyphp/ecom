<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon2Order extends Model
{
    use HasFactory;
    public $fillable  = [
        'coupon_id',
        'order_id',
    ];
}