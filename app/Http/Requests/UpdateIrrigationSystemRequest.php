<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIrrigationSystemRequest extends FormRequest
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
                'date',
                'before:end_date',
            ],

            'end_date' => [
                'date',
                'after:start_date',
            ],

            'weather_prediction' => [
                'string',
            ],

            'specific_needs' => [
                'string',
            ],

            'crop_id' => [
                'exists:crops,id',
            ],
            'sensor_id' => [
                'exists:sensors,id',
            ],
        ];

    }

    public function messages()
    {
        return [
            'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',
            'start_date.before' => 'La fecha de inicio debe ser anterior a la fecha de finalización.',

            'end_date.date' => 'La fecha de finalización debe ser una fecha válida.',
            'end_date.after' => 'La fecha de finalización debe ser posterior a la fecha de inicio.',

            'weather_prediction.string' => 'La predicción del clima debe ser un texto.',

            'specific_needs.string' => 'Las necesidades específicas deben ser un texto.',

            'crop_id.exists' => 'El cultivo seleccionado no es válido.',

            'sensor_id.exists' => 'El sensor seleccionado no es válido.',
        ];
    }

}
