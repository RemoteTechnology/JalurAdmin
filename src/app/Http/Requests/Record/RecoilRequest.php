<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;

class RecoilRequest extends FormRequest
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
            'user_id'           => ['required'],
            'recoil_training'   => ['required'],
            'schedule_day'      => ['required'],
            'payments'          => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'id.required'               => 'Укажите ID записи!',
            'user_id.required'          => 'Укажите ID клиента!',
            'recoil_training.required'  => 'Укажите количество тренировок которые вы хотите убрать!',
            'schedule_day.required'     => 'Укажите дни тех тренировок которые вы хотите убрать!',
            'payments'                  => 'Укажите объект платежа!'
        ];
    }
}
