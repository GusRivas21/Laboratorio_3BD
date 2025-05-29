<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CropResource;

class PredictiveAnalysisResource extends JsonResource
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
            'historical_data' => $this->historical_data,
            'climatic_conditions' => $this->climatic_conditions,
            'market_variables' => $this->market_variables,
            'recommendations' => $this->recommendations,
            'crop_id' =>  new CropResource($this->crop)
        ];
    }
}
