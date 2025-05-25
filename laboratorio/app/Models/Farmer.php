<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Farmer extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'registration_date'
    ];
}
