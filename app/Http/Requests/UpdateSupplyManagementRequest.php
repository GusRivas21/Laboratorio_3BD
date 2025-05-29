<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplyManagementRequest extends FormRequest
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
            'type' => [
                'required',
                'string'
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'application_date' => [
                'required',
                'date'
            ],
            'quantity_used' => [
                'required',
                'numeric',
                'min:0'
            ],
            'observed_effectiveness' => [
                'required',
                'string',
                'max:255'
            ],
            'crop_id' => [
                'required',
                'exists:crops,id'
            ]
        ];
    }
}
