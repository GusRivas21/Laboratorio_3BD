<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePredictiveAnalysisRequest extends FormRequest
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
            'historical_data' => [
                'required',
                'string',
                'max:255',
            ],
            'climatic_conditions' => [
                'required',
                'string',
                'max:255',
            ],
            'market_variables' => [
                'required',
                'string',
                'max:255'
            ],
            'recommendations' => [
                'required',
                'string',
                'max:255'
            ],
            'crop_id' => [
                'exists:crops,id'
            ]
        ];
    }

    public function messages()
    {
        return [
            'historical_data.required' => 'El campo de datos históricos es obligatorio.',
            'historical_data.string' => 'Los datos históricos deben ser una cadena de texto.',
            'historical_data.max' => 'Los datos históricos no deben exceder los 255 caracteres.',

            'climatic_conditions.required' => 'El campo de condiciones climáticas es obligatorio.',
            'climatic_conditions.string' => 'Las condiciones climáticas deben ser una cadena de texto.',
            'climatic_conditions.max' => 'Las condiciones climáticas no deben exceder los 255 caracteres.',

            'market_variables.required' => 'El campo de variables del mercado es obligatorio.',
            'market_variables.string' => 'Las variables del mercado deben ser una cadena de texto.',
            'market_variables.max' => 'Las variables del mercado no deben exceder los 255 caracteres.',

            'recommendations.required' => 'El campo de recomendaciones es obligatorio.',
            'recommendations.string' => 'Las recomendaciones deben ser una cadena de texto.',
            'recommendations.max' => 'Las recomendaciones no deben exceder los 255 caracteres.',

            'crop_id.exists' => 'El cultivo seleccionado no es válido.',
        ];
    }

}
