<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCropRequest extends FormRequest
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
            'planting_variety' =>
            [
                'string',
                'max:255'
            ],
            'sowing_date' =>
            [
                'date'
            ],
            'expected_growth_cycle' =>
            [
                'string',
                'min:1'
            ],
            'nutritional_requirements' =>
            [
                'string'
            ],
            'pest_resistance' =>
            [
                'string'
            ],
            'optimal_climatic_conditions' =>
            [
                'string'
            ],
            'property_id' =>
            [
                'exists:properties,id'
            ],
        ];
    }
public function messages()
{
    return [
        'planting_variety.string'   => 'La variedad de siembra debe ser un texto.',
        'planting_variety.max'      => 'La variedad de siembra no debe exceder los 255 caracteres.',

        'sowing_date.date'     => 'La fecha de siembra debe ser una fecha válida.',

        'expected_growth_cycle.string'   => 'El ciclo de crecimiento esperado debe ser un texto.',
        'expected_growth_cycle.min'      => 'El ciclo de crecimiento esperado debe tener al menos un carácter.',

        'nutritional_requirements.string'   => 'Los requerimientos nutricionales deben ser un texto.',

        'pest_resistance.string'   => 'La resistencia a plagas debe ser un texto.',

        'optimal_climatic_conditions.string'   => 'Las condiciones climáticas óptimas deben ser un texto.',

        'property_id.exists'   => 'La propiedad seleccionada no es válida.',
    ];
}

}
