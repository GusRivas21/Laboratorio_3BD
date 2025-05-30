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
                'string',
                'max:255',
            ],

            'status' => [
                'string'
            ],

            'soil_moisture' => [
                'numeric',
                'min:0',
            ],

            'room_temperature' => [
                'numeric',
            ],

            'precipitation' => [
                'numeric',
                'min:0',
            ],

            'wind_speed' => [
                'numeric',
                'min:0',
            ],

            'ph_level' => [
                'numeric',
                'between:0,14',
            ],

            'available_nutrients' => [
                'numeric',
                'min:0',
            ],

            'data_date' => [
                'date',
            ],

            'property_id' => [
                'exists:properties,id',
            ],

            'type_sensor_id' => [
                'exists:type_sensors,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'location.string' => 'La ubicación debe ser una cadena de texto.',
            'location.max' => 'La ubicación no debe exceder 255 caracteres.',

            'status.string' => 'El estado debe ser una cadena de texto.',

            'soil_moisture.numeric' => 'La humedad del suelo debe ser un valor numérico.',
            'soil_moisture.min' => 'La humedad del suelo no puede ser negativa.',

            'room_temperature.numeric' => 'La temperatura ambiente debe ser un valor numérico.',

            'precipitation.numeric' => 'La precipitación debe ser un valor numérico.',
            'precipitation.min' => 'La precipitación no puede ser negativa.',

            'wind_speed.numeric' => 'La velocidad del viento debe ser un valor numérico.',
            'wind_speed.min' => 'La velocidad del viento no puede ser negativa.',

            'ph_level.numeric' => 'El nivel de pH debe ser un valor numérico.',
            'ph_level.between' => 'El nivel de pH debe estar entre 0 y 14.',

            'available_nutrients.numeric' => 'Los nutrientes disponibles deben ser un valor numérico.',
            'available_nutrients.min' => 'Los nutrientes disponibles no pueden ser negativos.',

            'data_date.date' => 'La fecha de los datos debe ser una fecha válida.',

            'property_id.exists' => 'La propiedad seleccionada no existe.',

            'type_sensor_id.exists' => 'El tipo de sensor seleccionado no existe.',
        ];
    }
}
