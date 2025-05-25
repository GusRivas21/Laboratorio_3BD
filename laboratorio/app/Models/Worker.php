<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Worker extends Model
{

    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'assigned_area',
        'training_level',
        'productivity_evaluation'
    ];
}
