<?php

namespace App\Models;

use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\Crop;

class PredictiveAnalysis extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'historical_data',
        'climatic_conditions',
        'market_variables',
        'recommendations',
        'crop_id'
    ];

    public function crop():BelongsTo
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }
}
