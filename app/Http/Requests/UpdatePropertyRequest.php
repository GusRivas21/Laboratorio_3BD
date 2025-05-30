<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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

    public function messages()
    {
        return [
            'geographic_location.required' => 'La ubicación geográfica es obligatoria.',
            'geographic_location.string' => 'La ubicación geográfica debe ser una cadena de texto.',
            'geographic_location.max' => 'La ubicación geográfica no debe exceder los 255 caracteres.',

            'total_area.required' => 'El área total es obligatoria.',
            'total_area.numeric' => 'El área total debe ser un número.',
            'total_area.min' => 'El área total debe ser al menos 0.01.',

            'soil_type.required' => 'El tipo de suelo es obligatorio.',
            'soil_type.string' => 'El tipo de suelo debe ser una cadena de texto.',
            'soil_type.max' => 'El tipo de suelo no debe exceder los 100 caracteres.',

            'prevailing_climate.required' => 'El clima predominante es obligatorio.',
            'prevailing_climate.string' => 'El clima predominante debe ser una cadena de texto.',
            'prevailing_climate.max' => 'El clima predominante no debe exceder los 100 caracteres.',

            'water_sources.string' => 'Las fuentes de agua deben ser una cadena de texto.',
            'water_sources.max' => 'Las fuentes de agua no deben exceder los 255 caracteres.',

            'organic_certification.required' => 'El campo de certificación orgánica es obligatorio.',
            'organic_certification.boolean' => 'La certificación orgánica debe ser verdadera o falsa.',

            'farmer_id.required' => 'El campo agricultor es obligatorio.',
            'farmer_id.exists' => 'El agricultor seleccionado no es válido.',
        ];
    }

}
