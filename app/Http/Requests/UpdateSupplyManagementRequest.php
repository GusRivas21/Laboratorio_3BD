<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplyManagementRequest extends FormRequest
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
            'type' => [
                'string'
            ],
            'name' => [
                'string',
                'max:255'
            ],
            'application_date' => [
                'date'
            ],
            'quantity_used' => [
                'numeric',
                'min:0'
            ],
            'observed_effectiveness' => [
                'string',
                'max:255'
            ],
            'crop_id' => [
                'exists:crops,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'type.string' => 'El tipo debe ser una cadena de texto.',

            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder 255 caracteres.',

            'application_date.date' => 'La fecha de aplicación debe ser una fecha válida.',

            'quantity_used.numeric' => 'La cantidad utilizada debe ser un valor numérico.',
            'quantity_used.min' => 'La cantidad utilizada no puede ser negativa.',

            'observed_effectiveness.string' => 'La efectividad observada debe ser una cadena de texto.',
            'observed_effectiveness.max' => 'La efectividad observada no debe exceder 255 caracteres.',

            'crop_id.exists' => 'El cultivo seleccionado no existe.',
        ];
    }

}
