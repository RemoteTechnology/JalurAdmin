@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container mb-5">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Добавить расписание для зала - "{{ $hall->name }}"</h3>
                </div>
                <div class="row">
                    <div class="col-6 mx-auto mt-5">
                        <form action="{{ route('schedule.form.create') }}" method="post">
                            @csrf
                            @if ($hall != null)
                                <input type="hidden" name="hall_id" value="{{ $hall->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Выберите тренировку</label>
                                    @if (count($workouts) != 0)
                                        <select class="form-select" name="workout_id">
                                            @foreach ($workouts as $workout)
                                                <option value="{{ $workout->id }}">{{ $workout->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Данных нет!</span>
                                                <a class="btn" href="{{ route('workout.index') }}">Добавить</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Выберите тренера</label>
                                    @if (count($couches) != 0)
                                        <select class="form-select" name="couch_id">
                                            @foreach ($couches as $couch)
                                                <option value="{{ $couch->id }}">{{ $couch->last_name }} {{ $couch->first_name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Данных нет!</span>
                                                <a class="btn" href="{{ route('user.registration') }}">Добавить</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Выберите время</label>
                                    @if(count($schedule_times) != 0)
                                        <div class="row">
                                            @foreach ($schedule_times as $schedule_time)
                                                <div class="col-2">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                            class="form-check-input"
                                                            name="schedule_time_id"
                                                            value="{{ $schedule_time->id }}"
                                                            type="radio"
                                                            name="flexRadioDefault"
                                                            id="flexRadioDefault1">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault1">
                                                            {{ mb_substr($schedule_time->start_time, 0, 5) }}
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
                                        value="{{ old('phone') }}"
                                        @error('date') is-invalid @enderror>
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
                                        value="15">
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
