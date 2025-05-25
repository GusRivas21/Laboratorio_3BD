<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Sensor extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'location',
        'status',
        'soil_moisture',
        'room_temperature',
        'precipitation',
        'wind_speed',
        'ph_level',
        'available_nutrients',
        'data_date',
        'property_id',
        'type_sensor_id'
    ];

    public function property() : BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function typeSensor() : BelongsTo
    {
        return $this->belongsTo(TypeSensor::class);
    }
}
