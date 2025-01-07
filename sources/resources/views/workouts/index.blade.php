@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Тренировки</h3>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn p-right" data-bs-toggle="modal" data-bs-target="#workoutTypeModal">Виды тренировок</button>
                    <!-- Modal Type Workout -->
                    <div class="modal fade" id="workoutTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить тип тренировки</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('workout.form.type_create') }}"
                                        method="post"
                                        class="p-3">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                class="form-control"
                                                name="name"
                                                id="nameInput"
                                                placeholder="Укажите наименование"
                                                aria-label="Recipient's username"
                                                aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" data-bs-dismiss="modal" aria-label="Close">Сохранить</button>
                                        </div>
                                    </form>
                                    <div class="row mt-4">
                                        @if (empty($type_workouts))
                                            <div class="alert alert-warning" role="alert">Данных нет!</div>
                                        @else
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Наименование</th>
                                                    <th scope="col">Действие</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($type_workouts as $type_workout)
                                                        <tr>
                                                            <th scope="row">{{ $type_workout->id }}</th>
                                                            <td>{{ $type_workout->name }}</td>
                                                            <td>
                                                                <form action="{{ route('workout.form.type_delete') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $type_workout->id }}">
                                                                    <button type="submit" class="btn btn-del">Удалить</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#workoutModal">Добавить</button>
                    <!-- Modal Workout -->
                    <div class="modal fade" id="workoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить тренировку</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('workout.form.create') }}" method="post" class="p-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            @if (empty($type_workouts))
                                                <div class="alert alert-warning" role="alert">Данных нет!<br>Добавьте тип тренировки.</div>
                                            @else
                                                <label for="typeWorkoutIdInput" class="form-label">Выберите тип тренировки</label>
                                                <select class="form-select" name="type_workout_id" id="typeWorkoutIdInput" aria-label="Default select example">
                                                    @foreach ($type_workouts as $type_workout)
                                                        <option value="{{ $type_workout->id }}">{{ $type_workout->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameInput"
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
                                            <label for="descriptionInput"
                                                class="form-label">
                                                    Описание <b>*</b>
                                                    @error('description') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <textarea name="description"
                                                id="descriptionInput"
                                                class="form-control"
                                                cols="30" rows="10">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="imagesInput"
                                                class="form-label">
                                                    Изображение обложки <b>*</b>
                                                    @error('images') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                            </label>
                                            <input type="file" class="form-control" name="images" id="imagesInput">
                                        </div>
                                        <button type="submit" class="btn" data-bs-dismiss="modal" aria-label="Close">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($workouts && count($workouts) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="w-22">Наименование</th>
                            <th scope="col" class="w-22">Тип тренировки</th>
                            <th scope="col" class="w-45">Описание</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($workouts as $workout)
                                <tr>
                                    <td>{{ $workout->name }}</td>
                                    @if(!empty($type_workout))
                                        @foreach ($type_workouts as $type_workout)
                                            @if ($type_workout->id == $workout->type_workout_id)
                                                <td>{{ $type_workout->name }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                    <td>{{ mb_substr($workout->description, 0, 60) }}</td>
                                    <td>
                                        <form action="{{ route('workout.form.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $workout->id }}">
                                            <a href="{{ route('workout.show', ['id' => $workout->id]) }}" class="btn w-100 mb-2">Подробнее</a>
                                            <button type="submit" class="btn btn-del w-100">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning" role="alert">
                        Данных нет! @if (empty($type_workouts)) <b>Добавьте тип тренировки.</b> @endif
                    </div>
                @endif
            </div>
        </div>
    @endauth
@endsection
