<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Traceability extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'processes',
        'crop_id',
    ];

    public function crop() : BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }
}
