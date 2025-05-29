<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignedTaskRequest extends FormRequest
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
            'start_date' => [
                'required',
                'date',
            ],
            'task_description' => [
                'required',
                'string',
                'max:255',
            ],
            'task_status' => [
                'required',
                'string'
            ],
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
            ],
            'worker_id' => [
                'required',
                'exists:workers,id',
            ],
            'crop_id' => [
                'required',
                'exists:crops,id',
            ],
        ];
    }

    public function messages()
{
    return [
        'start_date.required' => 'La fecha de inicio es obligatoria.',
        'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',

        'end_date.required' => 'La fecha de fin es obligatoria.',
        'end_date.date' => 'La fecha de fin debe ser una fecha válida.',
        'end_date.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',

        'task_description.required' => 'La descripción de la tarea es obligatoria.',
        'task_description.string' => 'La descripción debe ser un texto.',
        'task_description.max' => 'La descripción no debe exceder los 255 caracteres.',

        'task_status.required' => 'El estado de la tarea es obligatorio.',
        'task_status.string' => 'El estado de la tarea debe ser un texto.',

        'worker_id.required' => 'El campo trabajador es obligatorio.',
        'worker_id.exists'   => 'El trabajador seleccionado no es válido.',

        'crop_id.required'   => 'El campo cultivo es obligatorio.',
        'crop_id.exists'     => 'El cultivo seleccionado no es válido.',
    ];
}

}
