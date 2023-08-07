<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaxClass extends Model
{
    protected $fillable = [
        'name',
    ];

    public function taxRates(): HasMany
    {
        return $this->hasMany(TaxRate::class, 'tax_class_id');
    }
}
