<?php

namespace App\Http\Requests\Workout;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutUpdateRequest extends FormRequest
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
            'id'                        => ['required', 'integer'],
            'name'                      => ['required'],
            'description'               => ['required'],
            // 'images'                    => ['required'],
            'type_workout_id'           => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'               => 'Укажите Id тренировки!',
            'id.integer'                => 'Id тренировки должен быть целочисленным!',

            'name.required'             => 'Укажите наименование тренировки!',
            'description.required'      => 'Укажите описание тренировки!',
            // 'images.required'           => 'Укажите ваш возраст!',
            'type_workout_id.required'  => 'Укажите Id типа тренировки!',
        ];
    }
}
