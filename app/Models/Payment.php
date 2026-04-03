<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'amount',
        'status',
        'lease_id'
    ];

    public function payments()
    {
        return $this->belongsTo(Lease::class);
    }
}
