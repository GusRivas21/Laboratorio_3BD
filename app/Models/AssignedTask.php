<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class AssignedTask extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'start_date',
        'task_description',
        'task_status',
        'end_date',
        'worker_id',
        'crop_id'
    ];

    public function worker() : BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }

    public function crop() : BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }
}
