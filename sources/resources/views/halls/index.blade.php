@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Залы</h3>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn p-right" data-bs-toggle="modal" data-bs-target="#workoutTypeModal">Добавить</button>
                    <!-- Modal Type Workout -->
                    <div class="modal fade" id="workoutTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить новый зал</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('hall.form.create') }}" method="post" class="p-3">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="#nameInput"
                                                class="form-label">
                                                    Наименование <b>*</b>
                                                    @error('name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <input type="text"
                                                class="form-control"
                                                name="name"
                                                id="nameInput"
                                                value="{{ old('name') }}"
                                                @error('name') is-invalid @enderror>
                                        </div>
                                        <div class="mb-3">
                                            <label for="#addresInput"
                                                class="form-label">
                                                    Адрес <b>*</b>
                                                    @error('addres') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <input type="text"
                                            class="form-control"
                                            name="addres"
                                            id="addresInput"
                                            value="{{ old('addres') }}"
                                            @error('addres') is-invalid @enderror>
                                        </div>
                                        <div class="mb-3">
                                            <label for="#descriptionInput"
                                                class="form-label">
                                                Описание <b>*</b>
                                                @error('description') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <textarea name="description"
                                                class="form-control"
                                                id="descriptionInput"
                                                cols="30" rows="10"
                                                @error('description') is-invalid @enderror>{{ old('description') }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="#descriptionInput"
                                                class="form-label">
                                                    Режим работы <b>*</b>
                                                    @error('start_work_time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                                    @error('end_work_time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <div class="row">
                                                <div class="col-6">С <input type="time" class="form-control" name="start_work_time" value="{{ old('start_work_time') }}"> </div>
                                                <div class="col-6">До <input type="time" class="form-control" name="end_work_time" value="{{ old('end_work_time') }}"> </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(!empty($halls))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="w-22">Название зала</th>
                                    <th scope="col" class="w-22">Адрес</th>
                                    <th scope="col" class="w-22">Описание</th>
                                    <th scope="col" class="w-22">Время работы</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($halls as $hall)
                                    <tr>
                                        <th scope="row">{{ $hall->id }}</th>
                                        <td>{{ $hall->name }}</td>
                                        <td>{{ $hall->addres }}</td>
                                        <td>
                                            <p class="text-table-description">{{ mb_substr($hall->description, 0, 110) }}</p>
                                        </td>
                                        <td>
                                            С <b>{{ mb_substr($hall->start_work_time, 0, 5) }}</b> До <b>{{ mb_substr($hall->end_work_time, 0, 5) }}</b>
                                        </td>
                                        <td>
                                            <form action="{{ route('hall.form.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $hall->id }}">
                                                <a href="{{ route('hall.show', ['id' => $hall->id]) }}" class="btn w-100 mb-2">Подробнее</a>
                                                <button type="submit" class="btn btn-del w-100">Удалить</button>
                                            </form>
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
