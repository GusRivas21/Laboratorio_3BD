<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;


class Crop extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'planting_variety',
        'sowing_date',
        'expected_growth_cycle',
        'nutritional_requirements',
        'pest_resistance',
        'optimal_climatic_conditions',
        'property_id'
    ];

    public function property() : BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
