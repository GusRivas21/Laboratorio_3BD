<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSensorRequest extends FormRequest
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
            'location' => [
                'required',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                'string'
            ],

            'soil_moisture' => [
                'required',
                'numeric',
                'min:0',
            ],

            'room_temperature' => [
                'required',
                'numeric',
            ],

            'precipitation' => [
                'required',
                'numeric',
                'min:0',
            ],

            'wind_speed' => [
                'required',
                'numeric',
                'min:0',
            ],

            'ph_level' => [
                'required',
                'numeric',
                'between:0,14',
            ],

            'available_nutrients' => [
                'required',
                'numeric',
                'min:0',
            ],

            'data_date' => [
                'required',
                'date',
            ],

            'property_id' => [
                'required',
                'exists:properties,id',
            ],

            'type_sensor_id' => [
                'required',
                'exists:type_sensors,id',
            ],
        ];
    }
}
