<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'subtotal', 
        'shipping', 
        'coupon',
        'tax', 
        'total',
        'status',
        'tax_rate_id', 
        'delivery_customer_id',
        'billing_customer_id',    
    ];
    public function delivery()
    {
        return $this->belongsTo(Customer::class, 'delivery_customer_id', 'id');
    }
    public function billing()
    {
        return $this->belongsTo(Customer::class, 'billing_customer_id', 'id');
    }
    public function rows()
    {
        return $this->hasMany(Order2Products::class);
    }
}