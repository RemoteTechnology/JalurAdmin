<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleCreateRequest extends FormRequest
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
            'hall_id'                   => ['required'],
            'workout_id'                => ['required'],
            'couch_id'                  => ['required'],
            'schedule_time_id'          => ['required'],
            'date'                      => ['required'],
            'count_record'              => ['nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'hall_id.required'          => 'Укажите ID зала!',
            'workout_id.required'       => 'Укажите ID тренировки!',
            'couch_id.required'         => 'Укажите ID тренера!',
            'schedule_time_id.required' => 'Укажите ID времени расписания!',
            'date.required'             => 'Укажите дату!',
        ];
    }
}
