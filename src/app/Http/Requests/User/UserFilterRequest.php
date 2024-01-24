<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest
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
            'first_name'            => ['nullable'],
            'last_name'             => ['nullable'],
            'phone'                 => ['nullable', 'max:18'],
            'gender'                => ['nullable'],
            'role'                  => ['nullable'],
            'age'                   => ['nullable'],
            'is_schedule'           => ['nullable'],
        ];
    }
}
