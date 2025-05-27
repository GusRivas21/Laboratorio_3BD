<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignedTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'task_description' => $this->task_description,
            'task_status' => $this->task_status,
            'end_date' => $this->end_date,
            'worker_id' => new WorkerResource($this->worker),
            'crop_id' =>  new CropResource($this->crop)
        ];
    }
}
