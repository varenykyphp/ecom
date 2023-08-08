<?php

namespace VarenykyECom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxRate extends Model
{
    protected $fillable = [
        'tax_class_id',
        'rate',
        'active_from',
        'active_to',
    ];


    public function taxClass(): BelongsTo
    {
        return $this->belongsTo(TaxClass::class, 'tax_class_id');
    }

}
