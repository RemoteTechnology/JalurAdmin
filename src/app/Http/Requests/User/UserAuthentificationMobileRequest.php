<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthentificationMobileRequest extends FormRequest
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
            'phone'                 => ['required', 'max:18'],
            'code'                  => ['required', 'max:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required'        => 'Укажите фамилию!',
            'phone.max'             => 'Номер телефона не может быть меньше :max символов!',

            'code.required'         => 'Укажите код из СМС!',
            'code.max'              => 'Код не может быть меньше :max символов!',
        ];
    }
}
