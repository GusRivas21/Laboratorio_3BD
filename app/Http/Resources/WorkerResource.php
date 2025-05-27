<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'assigned_area' => $this->assigned_area,
            'training_level' => $this->training_level,
            'productivity_evaluation' => $this->productivity_evaluation
        ];
    }
}
