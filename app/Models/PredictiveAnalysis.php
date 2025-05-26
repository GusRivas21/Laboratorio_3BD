<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PredictiveAnalysis extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'historical_data',
        'climatic_conditions',
        'market_variables',
        'recommendations'
    ];
}
