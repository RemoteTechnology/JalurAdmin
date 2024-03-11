@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container mb-5">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Добавить расписание для зала - "{{ $hall->name }}"</h3>
                </div>
                <div class="d-flex justify-content-end ">
                    <a href="{{ route('schedule.form.delete', ['id' => $schedule_id]) }}" class="btn btn-del">Удалить</a>
                </div>
                <div class="row">
                    <div class="col-6 mx-auto mt-5">
                        <form action="{{ route('schedule.form.update') }}" method="post">
                            @csrf
                            @if ($hall != null)
                                <input type="hidden" name="schedule_id" value="{{ $schedule_id }}">
                                <input type="hidden" name="hall_id" value="{{ $hall->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Выберите тренировку</label>
                                        @if (count($couches) != 0)
                                            <div class="mb-3">
                                                <select class="form-select" name="couch">
                                                    @foreach ($workouts as $workout)
                                                        <option value="{{ $workout->id }}">{{ $workout->name }}</option>
                                                    @endforeach
                                                </select>

                                        @else
                                            <div class="alert alert-warning" role="alert">
                                                <div class="d-flex justify-content-between align-items-center ">
                                                    <span>Данных нет!</span>
                                                    <a href="{{ route('workout.index') }}" class="btn">Добавить</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Выберите тренера</label>
                                        @if (count($couches) != 0)
                                            <select class="form-select" name="couch">
                                                @foreach ($couches as $couch)
                                                    <option value="{{ $couch->id }}">{{ $couch->last_name }} {{ $couch->first_name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                        <div class="alert alert-warning" role="alert">
                                            <div class="d-flex justify-content-between align-items-center ">
                                                <span>Данных нет!</span>
                                                <a href="{{ route('user.registration') }}" class="btn">Добавить</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                <div class="mb-3">
                                    <label class="form-label">Выберите время</label>
                                    @if($current_schedule_time)
                                        <div class="row">
                                            @foreach ($schedule_times as $schedule_time_item)
                                                <div class="col-2">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                            class="form-check-input"
                                                            name="schedule_time_id"
                                                            value="{{ $schedule_time_item->id }}"
                                                            type="radio"
                                                            name="flexRadioDefault"
                                                            id="flexRadioDefault1"
                                                            @if ($schedule_time_item->id == $current_schedule_time->id) checked @endif>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{ mb_substr($schedule_time_item->start_time, 0, 5) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @error('schedule_time_id')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Данных нет!</span>
                                                <a class="btn" href="{{ route('schedule.time') }}">Добавить</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="dateInput"
                                        class="form-label">
                                            Укажите дату <b>*</b>
                                            @error('date') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="date"
                                        class="form-control"
                                        name="date"
                                        value="{{ mb_substr($schedule->date, 0, 10) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="dateInput"
                                        class="form-label">
                                            Установить лимит записей <b>*</b>
                                            @error('count_record') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </label>
                                    <input type="number"
                                        class="form-control"
                                        name="count_record"
                                        value="{{ $schedule->count_record }}">
                                </div>
                                <button type="submit" class="btn">Сохранить</button>
                            @else
                                <div class="alert alert-warning" role="alert">Данных нет!</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
