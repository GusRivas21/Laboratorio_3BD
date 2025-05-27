<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'geographic_location' => [
                'required',
                'string',
                'max:255',
            ],
            'total_area' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'soil_type' => [
                'required',
                'string',
                'max:100',
            ],
            'prevailing_climate' => [
                'required',
                'string',
                'max:100',
            ],
            'water_sources' => [
                'nullable',
                'string',
                'max:255',
            ],
            'organic_certification' => [
                'required',
                'boolean',
            ],
            'farmer_id' => [
                'required',
                'exists:farmers,_id',
            ],
        ];
    }
}
