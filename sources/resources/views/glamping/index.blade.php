@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Глемпинг</h3>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn p-right" data-bs-toggle="modal" data-bs-target="#workoutTypeModal">Добавить</button>
                    <!-- Modal Type Workout -->
                    <div class="modal fade" id="workoutTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Назначить мероприятие</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('glamping.form.create') }}" method="post" class="p-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="#nameInput"
                                                class="form-label">
                                                    Наименование мероприятия <b>*</b>
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
                                            <label for="#descriptionInput"
                                                class="form-label">
                                                    Описание <b>*</b>
                                                    @error('description') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <textarea name="description"
                                                class="form-control"
                                                id="descriptionInput"
                                                cols="30" rows="10">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="#imageInput"
                                                class="form-label">
                                                    Обложка <b>*</b>
                                                    @error('image') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <input type="file" class="form-control" name="image" id="imageInput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="#descriptionInput"
                                                class="form-label">
                                                    Дата проведения <b>*</b>
                                                    @error('date') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                                    @error('time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <div class="row">
                                                <div class="col-6">Дата <input type="date" class="form-control" name="date"> </div>
                                                <div class="col-6">Время <input type="time" class="form-control" name="time"> </div>
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
                    @if (count($glampings) == 0)
                        <div class="alert alert-warning" role="alert">Данных нет!</div>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Активность</th>
                                    <th scope="col" class="w-22">Заголовок</th>
                                    <th scope="col">Изображение</th>
                                    <th scope="col" class="w-45">Описание</th>
                                    <th scope="col" class="w-22">Дата мероприятия</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($glampings as $glamping)
                                    <tr>
                                        <th>
                                            @php
                                                $date_now = new DateTime();
                                            @endphp
                                            @if ($date_now->diff(new DateTime($glamping->date))->days > 0)
                                                <div class="alert alert-danger" role="alert">Не активен</div>
                                            @else
                                                <div class="alert alert-success" role="alert">Активн</div>
                                            @endif
                                        </th>
                                        <th>{{ $glamping->name }}</th>
                                        <th>
                                            <img src="{{ asset('/storage/' . $glamping->image) }}" class="img-fluid" alt="{{ $glamping->name }}">
                                        </th>
                                        <th>{{ mb_substr($glamping->description, 0, 140) }}...</th>
                                        <th>{{ $glamping->date }} - {{ $glamping->time }}</th>
                                        <th>
                                            <form action="{{ route('glamping.form.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $glamping->id }}">
                                                <a href="{{ route('glamping.info', ['id' => $glamping->id]) }}" class="btn w-100 mb-2">Подробнее</a>
                                                <button type="submit" class="btn btn-del w-100">Удалить</button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    @endauth
@endsection
