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
                'exists:crop,id'
            ]
        ];
    }
}
