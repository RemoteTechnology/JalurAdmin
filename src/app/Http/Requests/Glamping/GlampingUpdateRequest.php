<?php

namespace App\Http\Requests\Glamping;

use Illuminate\Foundation\Http\FormRequest;

class GlampingUpdateRequest extends FormRequest
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
            'id'                                => ['required', 'integer'],
            'name'                              => ['required'],
            'description'                       => ['required'],
            'date'                              => ['required'],
            'time'                              => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'                       => 'Укажите Id мероприятия!',
            'id.integer'                        => 'Id должен быть целым числом!',

            'name.required'                     => 'Укажите заголовок мероприятия!',
            'description.required'              => 'Укажите описание мероприятия!',
            'date.required'                     => 'Укажите дату проведения мероприятия!',
            'time.required'                     => 'Укажите время проведения мероприятия!',
        ];
    }
}
