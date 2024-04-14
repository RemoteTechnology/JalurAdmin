<?php

namespace App\Http\Requests\Abonement;

use Illuminate\Foundation\Http\FormRequest;

class AbonementUpdateRequest extends FormRequest
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
            'id'                => ['required'],
            'title'             => ['required'],
            'price'             => ['required', 'numeric'],
            'time_of_action'    => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'               => 'Укажите ID абонемента!',
            'title.required'            => 'Укажите название абонемента!',
            'price.required'            => 'Укажите цену!',
            'price.numeric'             => 'Ошибка типа!',
            'time_of_action.required'   => 'Укажите срок действия абонемента!',
            'time_of_action.numeric'    => 'Ошибка типа!'
        ];
    }
}
