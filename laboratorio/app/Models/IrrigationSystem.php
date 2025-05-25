<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class IrrigationSystem extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'start_date',
        'end_date',
        'weatther_prediction',
        'specific_needs',
        'crop_id',
        'sensor_id',
    ];

    public function crop() : BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }

    public function sensor() : BelongsTo
    {
        return $this->belongsTo(Sensor::class);
    }
}
