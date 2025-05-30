<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTraceabilityRequest extends FormRequest
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
            'processes' => [
                'string',
                'max:1000'
            ],
            'crop_id' => [
                'exists:crops,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'processes.string' => 'El campo de procesos debe ser una cadena de texto.',
            'processes.max' => 'El campo de procesos no debe exceder 1000 caracteres.',

            'crop_id.exists' => 'El cultivo seleccionado no existe.',
        ];
    }
}
