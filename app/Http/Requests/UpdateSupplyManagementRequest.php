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
                'required',
                'string'
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'application_date' => [
                'required',
                'date'
            ],
            'quantity_used' => [
                'required',
                'numeric',
                'min:0'
            ],
            'observed_effectiveness' => [
                'required',
                'string',
                'max:255'
            ],
            'crop_id' => [
                'required',
                'exists:crops,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'El tipo es obligatorio.',
            'type.string' => 'El tipo debe ser una cadena de texto.',

            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder 255 caracteres.',

            'application_date.required' => 'La fecha de aplicación es obligatoria.',
            'application_date.date' => 'La fecha de aplicación debe ser una fecha válida.',

            'quantity_used.required' => 'La cantidad utilizada es obligatoria.',
            'quantity_used.numeric' => 'La cantidad utilizada debe ser un valor numérico.',
            'quantity_used.min' => 'La cantidad utilizada no puede ser negativa.',

            'observed_effectiveness.required' => 'La efectividad observada es obligatoria.',
            'observed_effectiveness.string' => 'La efectividad observada debe ser una cadena de texto.',
            'observed_effectiveness.max' => 'La efectividad observada no debe exceder 255 caracteres.',

            'crop_id.required' => 'El cultivo es obligatorio.',
            'crop_id.exists' => 'El cultivo seleccionado no existe.',
        ];
    }

}
