<?php

namespace App\Http\Requests\Workout\Type;

use Illuminate\Foundation\Http\FormRequest;

class WorkoytTypeDeleteRequest extends FormRequest
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
            'id'                    => ['required', 'integer'],
        ];
    }
    public function messages(): array
    {
        return [
            'id.required'           => 'Id типа не указан!',
            'id.integer'            => 'Id типа должен быть целым числом!',
        ];
    }
}
