<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIrrigationSystemRequest extends FormRequest
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
                'before:end_date',
            ],

            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],

            'weather_prediction' => [
                'required',
                'string',
            ],

            'specific_needs' => [
                'required',
                'string',
            ],

            'crop_id' => [
                'required',
                'exists:crops,id',
            ],
            'sensor_id' => [
                'required',
                'exists:sensors,id',
            ],
        ];

    }

    public function messages()
    {
        return [
            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',
            'start_date.before' => 'La fecha de inicio debe ser anterior a la fecha de finalización.',

            'end_date.required' => 'La fecha de finalización es obligatoria.',
            'end_date.date' => 'La fecha de finalización debe ser una fecha válida.',
            'end_date.after' => 'La fecha de finalización debe ser posterior a la fecha de inicio.',

            'weather_prediction.required' => 'La predicción del clima es obligatoria.',
            'weather_prediction.string' => 'La predicción del clima debe ser un texto.',

            'specific_needs.required' => 'Las necesidades específicas son obligatorias.',
            'specific_needs.string' => 'Las necesidades específicas deben ser un texto.',

            'crop_id.required' => 'El campo cultivo es obligatorio.',
            'crop_id.exists' => 'El cultivo seleccionado no es válido.',

            'sensor_id.required' => 'El campo sensor es obligatorio.',
            'sensor_id.exists' => 'El sensor seleccionado no es válido.',
        ];
    }

}
