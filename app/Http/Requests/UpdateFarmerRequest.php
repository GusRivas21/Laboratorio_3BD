<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerRequest extends FormRequest
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
    public function prepareForValidation(): void
    {
        $this->merge([
            'registration_date' => now()->toDateString()
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'phone' => [
                'required',
                'string'
            ],
            'registration_date' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string'   => 'El nombre debe ser un texto.',
            'name.max'      => 'El nombre no debe exceder los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string'   => 'El correo electrónico debe ser un texto.',
            'email.email'    => 'El correo electrónico debe ser una dirección válida.',
            'email.max'      => 'El correo electrónico no debe exceder los 255 caracteres.',

            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.string'   => 'El número de teléfono debe ser un texto.',

            'registration_date.required' => 'La fecha de registro es obligatoria.',
            'registration_date.date'     => 'La fecha de registro debe ser una fecha válida.',
            'registration_date.before_or_equal' => 'La fecha de registro no puede ser posterior al día de hoy.',
        ];
    }

}
