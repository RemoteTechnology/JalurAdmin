<?php

namespace App\Http\Requests\User\Target;

use Illuminate\Foundation\Http\FormRequest;

class UserTargetCreateRequest extends FormRequest
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
            'collection'    => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'collection.required'           => 'Укажите цели!',
        ];
    }
}
