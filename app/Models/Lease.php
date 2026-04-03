<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    //
    protected $table = 'leases';

    protected $primaryKey = 'id';

    protected $fillable = [
        'start_data',
        'end_data',
        'rent',
        'tenant_id',
        'property_id'
    ];

    public function leases()
    {
        return $this->hasMany(Payment::class);
    }
    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }
}
