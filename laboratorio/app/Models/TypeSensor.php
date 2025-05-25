<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class TypeSensor extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'sensor_type',
        'sensor_model',
    ];

}
