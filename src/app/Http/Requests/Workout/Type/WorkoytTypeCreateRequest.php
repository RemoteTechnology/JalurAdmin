<?php

namespace App\Http\Requests\Workout\Type;

use Illuminate\Foundation\Http\FormRequest;

class WorkoytTypeCreateRequest extends FormRequest
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
            'name'                 => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Укажите наименование типа тренировки!',
        ];
    }
}
