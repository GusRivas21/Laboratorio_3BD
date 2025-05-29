<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IrrigationSystemResource extends JsonResource
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
            'end_date' => $this->end_date,
            'weather_prediction' => $this->weather_prediction,
            'specific_needs' => $this->specific_needs,
            'crop_id' => new CropResource($this->crop),
            'sensor_id' => new SensorResource($this->sensor)
        ];
    }
}
