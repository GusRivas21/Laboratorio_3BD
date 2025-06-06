<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplyManagementResource extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name,
            'application_date' => $this->application_date,
            'quantity_used' => $this->quantity_used,
            'observed_effectiveness' => $this->observed_effectiveness,
            'crop_id' =>  new CropResource($this->crop)
        ];
    }
}
