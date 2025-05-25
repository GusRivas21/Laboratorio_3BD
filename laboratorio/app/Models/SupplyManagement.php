<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class SupplyManagement extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'type',
        'name',
        'application_date',
        'quantity_used',
        'observed_effectiveness',
        'crop_id'
    ];

    public function crop() : BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }
}
