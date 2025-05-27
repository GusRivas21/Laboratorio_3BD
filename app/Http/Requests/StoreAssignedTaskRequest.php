<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignedTaskRequest extends FormRequest
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
            ],
            'task_description' => [
                'required',
                'string',
                'max:255',
            ],
            'task_status' => [
                'required',
                'string'
            ],
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
            ],
            'worker_id' => [
                'required',
                'exists:workers,id',
            ],
            'crop_id' => [
                'required',
                'exists:crops,id',
            ],
        ];
    }
}
