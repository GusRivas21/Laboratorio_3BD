<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Property extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'geographic_location',
        'total_area',
        'soil_type',
        'prevailing_climate',
        'water_sources',
        'organic_certification',
        'farmer_id'
    ];

    public function farmer() : BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }
}
