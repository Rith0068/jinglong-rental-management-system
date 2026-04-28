<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgBuilding extends Model
{
    //
    protected $table = 'pichture_buildings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'number_of_building',
        'property_id'
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
