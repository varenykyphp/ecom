<?php

namespace VarenykyECom\Models;

use App\Models\User;
use VarenykyECom\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use VarenykyLocale\Models\Country;

class Customer extends Model
{
    use HasFactory, Encryptable;

    protected $fillable = [
        'company_name',
        'name',
        'phone_number',
        'street',
        'house_number',
        'house_number_ex',
        'postalcode',
        'city',
        'state',
        'country_id',
        'user_id',
    ];

    protected $encryptable = [
        'company_name',
        'name',
        'phone_number',
        'street',
        'house_number',
        'house_number_ex',
        'postalcode',
        'city',
        'state',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
