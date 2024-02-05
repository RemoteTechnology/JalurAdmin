@extends('layouts.base')

@php
    $days = ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Восскресенье"];
@endphp

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container mb-5">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Время расписания</h3>
                </div>
                <div class="d-flex justify-content-end mb-5">
                    <a href="{{ route('schedule.time') }}" class="btn">Добавить время</a>
                    {{-- <a href="{{ route('schedule.create', ['hall_id' => 1]) }}" class="btn">Добавить</a> --}}
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="col-5">
                            <form action="{{ route('schedule.time.form.create') }}" method="post">
                                @csrf
                                <label class="form-label">
                                    Укажите время <b>*</b>
                                    @error('start_time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <div class="input-group mb-3">
                                    <input type="time"
                                        name="start_time"
                                        class="form-control"
                                        aria-label="Recipient's username"
                                        aria-describedby="button-addon2"
                                        value="{{ old('start_time') }}"
                                        @error('start_time') is-invalid @enderror>
                                    <button class="btn" type="submit" id="button-addon2">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (count($schedule_times) != 0)
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Доступное время для проведения тренировки</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule_times as $schedule_time)
                                    <tr>
                                        <td>{{ $schedule_time->id }}</td>
                                        <td>{{ mb_substr($schedule_time->start_time, 0, 5) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{-- <div class="col-6">
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="id" value="#">
                                                        <button class="btn w-100">Обновить</a>
                                                    </form>
                                                </div> --}}
                                                <div class="col-6">
                                                    <form action="{{ route('schedule.time.form.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{  $schedule_time->id }}">
                                                        <button class="btn btn-del w-100">Удалить</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">Данных нет!</div>
                    @endif
                </div>
            </div>
        </div>
    @endauth
@endsection
