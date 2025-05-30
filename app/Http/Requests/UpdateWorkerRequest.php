<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerRequest extends FormRequest
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
            'name' => [
                'string',
                'max:255'
            ],
            'assigned_area' => [
                'string',
                'max:255'
            ],
            'training_level' => [
                'string',
                'max:255'
            ],
            'productivity_evaluation' => [
                'json'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder 255 caracteres.',

            'assigned_area.string' => 'El área asignada debe ser una cadena de texto.',
            'assigned_area.max' => 'El área asignada no debe exceder 255 caracteres.',

            'training_level.string' => 'El nivel de capacitación debe ser una cadena de texto.',
            'training_level.max' => 'El nivel de capacitación no debe exceder 255 caracteres.',

            'productivity_evaluation.json' => 'La evaluación de productividad debe estar en formato JSON.',
        ];
    }
}
