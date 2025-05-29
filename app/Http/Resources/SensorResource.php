<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SensorResource extends JsonResource
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
            'location' => $this->location,
            'status' => $this->status,
            'soil_moisture' => $this->soil_moisture,
            'room_temperature' => $this->room_temperature,
            'precipitation' => $this->precipitation,
            'wind_speed' => $this->wind_speed,
            'ph_level' => $this->ph_level,
            'available_nutrients' => $this->available_nutrients,
            'data_date' => $this->data_date,
            'property_id' => new PropertyResource($this->property),
            'type_sensor_id' => new TypeSensorResource($this->typeSensor)
        ];
    }
}
