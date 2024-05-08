<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;

class RecordCreateRequest extends FormRequest
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
        // TODO: Убрать payments из реквеста и модели, написать отдельный запрос для оплаты
        return [
            'user_id'               => ['required'],
            'schedule_id'           => ['required'],
            'total_training'        => ['required'],
            'hall_id'               => ['required'],
            'type_record'           => ['required'],
            // 'payments'              => ['required', 'string'],
            'visition_date'         => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required'          => 'Укажите ID клиента!',
            'schedule_id.required'      => 'Укажите ID расписания!',
            'total_training.required'   => 'Укажите количество тренировок!', // Общее кол-во тренировок
            'hall_id.required'          => 'Укажите ID зала!',
            'type_record.required'      => 'Укажите тип тренировки!', // Глемпинг, Тренировка в зале
            // 'payments.required'         => 'Укажите данные о покупке!', // Object из Юкассы
            // 'payments.string'           => 'Payments должен быть строкой!',
            'visition_date.required'    => 'Укажите дату(ы) на которые хотите записаться!', // 01.01.2024,02.01.2024,...
            'visition_date.string'    => 'Даты визитов должны передаваться строкой!',
        ];
    }
}
