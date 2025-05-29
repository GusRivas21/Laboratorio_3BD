<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeSensorRequest extends FormRequest
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
            'sensor_type' => [
                'required',
                'string',
                'max:50',
            ],
            'brand' => [
                'required',
                'string',
                'max:50',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'sensor_type.required' => 'El tipo de sensor es obligatorio.',
            'sensor_type.string' => 'El tipo de sensor debe ser una cadena de texto.',
            'sensor_type.max' => 'El tipo de sensor no debe exceder 50 caracteres.',

            'brand.required' => 'La marca es obligatoria.',
            'brand.string' => 'La marca debe ser una cadena de texto.',
            'brand.max' => 'La marca no debe exceder 50 caracteres.',
        ];
    }
}
