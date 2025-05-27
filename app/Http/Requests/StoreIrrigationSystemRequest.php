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
}
