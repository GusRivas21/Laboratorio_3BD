<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCropRequest extends FormRequest
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
            'planting_variety' => ['required', 'string', 'max:255'],
            'sowing_date' => ['required', 'date'],
            'expected_growth_cycle' => ['required', 'string', 'min:1'],
            'nutritional_requirements' => ['required', 'string'],
            'pest_resistance' => ['required', 'string'],
            'optimal_climatic_conditions' => ['required', 'string'],
            'property_id' => ['required', 'exists:properties,id'],
        ];
    }
}
