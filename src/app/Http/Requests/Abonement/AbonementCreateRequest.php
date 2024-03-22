<?php

namespace App\Http\Requests\Abonement;

use Illuminate\Foundation\Http\FormRequest;

class AbonementCreateRequest extends FormRequest
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
            'title' => ['required'],
            'price' => ['required', 'numeric'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'    => 'Укажите название абонемента!',
            'price.required'    => 'Укажите цену!',
            'price.numeric'     => 'Ошибка типа!'
        ];
    }
}
