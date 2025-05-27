<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeSensorResource extends JsonResource
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
            'sensor_type' => $this->sensor_type,
            'brand' => $this->brand,
       ];
    }
}
