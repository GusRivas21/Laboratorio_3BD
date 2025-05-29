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

    public function messages(): array
    {
        return [
            'location.required' => 'La ubicación es obligatoria.',
            'location.string' => 'La ubicación debe ser una cadena de texto.',
            'location.max' => 'La ubicación no debe exceder 255 caracteres.',

            'status.required' => 'El estado es obligatorio.',
            'status.string' => 'El estado debe ser una cadena de texto.',

            'soil_moisture.required' => 'La humedad del suelo es obligatoria.',
            'soil_moisture.numeric' => 'La humedad del suelo debe ser un valor numérico.',
            'soil_moisture.min' => 'La humedad del suelo no puede ser negativa.',

            'room_temperature.required' => 'La temperatura ambiente es obligatoria.',
            'room_temperature.numeric' => 'La temperatura ambiente debe ser un valor numérico.',

            'precipitation.required' => 'La precipitación es obligatoria.',
            'precipitation.numeric' => 'La precipitación debe ser un valor numérico.',
            'precipitation.min' => 'La precipitación no puede ser negativa.',

            'wind_speed.required' => 'La velocidad del viento es obligatoria.',
            'wind_speed.numeric' => 'La velocidad del viento debe ser un valor numérico.',
            'wind_speed.min' => 'La velocidad del viento no puede ser negativa.',

            'ph_level.required' => 'El nivel de pH es obligatorio.',
            'ph_level.numeric' => 'El nivel de pH debe ser un valor numérico.',
            'ph_level.between' => 'El nivel de pH debe estar entre 0 y 14.',

            'available_nutrients.required' => 'Los nutrientes disponibles son obligatorios.',
            'available_nutrients.numeric' => 'Los nutrientes disponibles deben ser un valor numérico.',
            'available_nutrients.min' => 'Los nutrientes disponibles no pueden ser negativos.',

            'data_date.required' => 'La fecha de los datos es obligatoria.',
            'data_date.date' => 'La fecha de los datos debe ser una fecha válida.',

            'property_id.required' => 'El campo propiedad es obligatorio.',
            'property_id.exists' => 'La propiedad seleccionada no existe.',

            'type_sensor_id.required' => 'El tipo de sensor es obligatorio.',
            'type_sensor_id.exists' => 'El tipo de sensor seleccionado no existe.',
        ];
    }
}
