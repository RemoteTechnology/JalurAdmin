<?php

namespace App\Http\Requests\Hall;

use Illuminate\Foundation\Http\FormRequest;

class HallCreateRequest extends FormRequest
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
            'name'                      => ['required'],
            'addres'                    => ['required'],
            'description'               => ['required'],
            'start_work_time'           => ['required'],
            'end_work_time'             => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'             => 'Укажите наименование зала!',
            'addres.required'           => 'Укажите адрес зала!',
            'description.required'      => 'Укажите описание зала!',
            'start_work_time.required'  => 'Укажите время начала работы зала!',
            'end_work_time.required'    => 'Укажите время окончания работы зала!',
        ];
    }
}
