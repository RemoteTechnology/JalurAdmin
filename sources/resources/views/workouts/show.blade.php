@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Тренировки</h3>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{ route('workout.index') }}" class="btn">Назад</a>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <div class="col-7">
                        <form action="{{ route('workout.form.update') }}"
                              method="post"
                              class="p-3"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $workout->id }}">
                            <div class="mb-3">
                                @if (count($type_workouts) == 0)
                                    <div class="alert alert-warning" role="alert">Данных нет!<br>Добавьте тип тренировки.</div>
                                @else
                                    <label for="typeWorkoutIdInput" class="form-label">Выберите тип тренировки</label>
                                    <select class="form-select" name="type_workout_id" id="typeWorkoutIdInput" aria-label="Default select example">
                                        @foreach ($type_workouts as $type_workout)
                                            <option value="{{ $type_workout->id }}"
                                                    @if($type_workout->id == $workout->type_workout_id) selected @endif
                                            >{{ $type_workout->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Наименование
                                    @error('name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       id="nameInput"
                                       value="{{ $workout->name }}"
                                       @error('name') is-invalid @enderror>
                            </div>
                            <div class="mb-3">
                                <label for="descriptionInput" class="form-label">Описание
                                    @error('description') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <textarea name="description"
                                          id="descriptionInput"
                                          class="form-control"
                                          cols="30" rows="10">{{ trim($workout->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imagesInput"
                                       class="form-label">
                                    Изображение обложки
                                    @error('images') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                @if($workout->image)
                                    <section class="mb-3 col-6">
                                        <p>Сейчас используется:</p>
                                        <img src="{{ asset('/storage/' . $workout->image) }}" alt="{{ $workout->name }}" class="img-fluid">
                                    </section>
                                @endif
                                <input type="file" class="form-control" name="image" id="imagesInput">
                            </div>
                            <button type="submit" class="btn" data-bs-dismiss="modal" aria-label="Close">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
