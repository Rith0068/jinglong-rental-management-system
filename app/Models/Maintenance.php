<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    //
    protected $table = 'maintenance_requests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'unit_id'
    ];

    public function maintenances()
    {
        return $this->hasOne(Unit::class);
    }
}
