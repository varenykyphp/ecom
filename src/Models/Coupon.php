<?php

namespace VarenykyECom\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use VarenykyECom\Models\Customer;

class Coupon extends Model
{
    use HasFactory;

    public $fillable  = [
        'customer_id',
        'amount',
        'type',
        'description',
        'expires_at',
        'usage_limit',
        'active',
        'code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}