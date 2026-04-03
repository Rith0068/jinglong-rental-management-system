<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = 'units';

    protected $primaryKey = 'id';

    protected $fillable = [
        'phone_number',
        'rent_monthly',
        'status',
        'floor',
        'property_id'
    ];

    public function units()
    {
        return $this->belongsTo(Property::class);
    }
}
