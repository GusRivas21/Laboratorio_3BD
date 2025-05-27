<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CropResource extends JsonResource
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
            'planting_variety' => $this->planting_variety,
            'sowing_date' => $this->sowing_date,
            'expected_growth_cycle' => $this->expected_growth_cycle,
            'nutritional_requirements' => $this->nutritional_requirements,
            'pest_resistance' => $this->pest_resistance,
            'optimal_climatic_conditions' => $this->optimal_climatic_conditions,
            'property_id' => new PropertyResource($this->property)
        ];
    }
}
