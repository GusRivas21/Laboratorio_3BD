<?php

namespace App\Http\Resources;

use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'geographic_location' => $this->geographic_location,
            'total_area' => $this->total_area,
            'soil_type' => $this->soil_type,
            'prevailing_climate' => $this->prevailing_climate,
            'water_sources' => $this->water_sources,
            'organic_certification' => $this->organic_certification,
            'farmer_id' => new FarmerResource($this->farmer)
        ];
   
    }
}
