<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;

class RecordUpdateRequest extends FormRequest
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
            'id'                    => ['required'],
            'contract'              => ['required'],
            'user_id'               => ['required'],
            'schedule_id'           => ['required'],
            'total_training'        => ['required'],
            'remaining_training'    => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'           => 'Укажите ID записи!',
            'user_id.required'      => 'Укажите ID клиента!',
            'schedule_id.required'  => 'Укажите ID расписания!',
        ];
    }
}
