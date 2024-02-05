@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Зал "<b>{{ $hall->name }}</b>"</h3>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{ route('hall.index') }}" class="btn d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(241, 241, 241);">
                            <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                        </svg> Назад
                    </a>
                    <form action="{{ route('hall.form.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $hall->id }}">
                        <button type="submit" class="btn btn-del w-100">Удалить</button>
                    </form>
                </div>
                <form action="{{ route('hall.form.update') }}" method="post" class="p-3">
                    @csrf
                    <input type="hidden" name="id" value="{{ $hall->id }}">
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
                            value="{{ $hall->name }}"
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
                            value="{{ $hall->addres }}"
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
                            @error('description') is-invalid @enderror>{{ $hall->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="#descriptionInput"
                            class="form-label">
                                Режим работы <b>*</b>
                                @error('start_work_time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                @error('end_work_time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                        </label>
                        <div class="row">
                            <div class="col-6">
                                С <input type="time" class="form-control" name="start_work_time" value="{{ $hall->start_work_time }}">
                            </div>
                            <div class="col-6">
                                До <input type="time" class="form-control" name="end_work_time" value="{{ $hall->end_work_time }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn">Обновить данные зала</button>
                </form>
            </div>
        </div>
    @endauth
@endsection
