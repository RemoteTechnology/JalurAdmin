@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-5 mb-5">
                    <h3 class="text-center"><b>{{ $glamping->name }}</b></h3>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{ route('glamping.index') }}" class="btn d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(241, 241, 241);">
                            <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                        </svg> Назад
                    </a>
                    <form action="{{ route('glamping.form.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $glamping->id }}">
                        <button type="submit" class="btn btn-del w-100">Удалить</button>
                    </form>
                </div>
                <div class="col-8 mx-auto">
                    <form action="{{ route('glamping.form.update') }}"
                        method="post"
                        enctype="multipart/form-data"
                        class="p-3">
                        @csrf
                        <input type="hidden" name="id" value="{{ $glamping->id }}">
                        <div class="mb-3">
                            <label for="#descriptionInput"
                                class="form-label">
                                    Режим работы <b>*</b>
                                    @error('date') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    @error('time') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <div class="row">
                                <div class="col-6">
                                    Дата <input type="date"
                                            class="form-control"
                                            name="date"
                                            value="{{ $glamping->date }}"
                                            @error('date') is-invalid @enderror>
                                </div>
                                <div class="col-6">
                                    Время <input type="time"
                                            class="form-control"
                                            name="time"
                                            value="{{ $glamping->time }}"
                                            @error('time') is-invalid @enderror>
                                </div>
                            </div>
                        </div>
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
                                value="{{ $glamping->name }}"
                                @error('name') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="#imagesInput"
                                class="form-label">
                                    Изображение
                                    @error('images') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            @php
                                $img = json_decode($glamping->images, true);

                            @endphp
                            <section class="mb-2">
                                <img src="{{ asset('/storage/' . $img[0]['name']) }}" class="img-fluid" alt="{{ $glamping->name }}">
                            </section>
                            <input type="file"
                                class="form-control"
                                name="images"
                                id="imagesInput"
                                @error('images') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="#descriptionInput"
                                class="form-label">
                                    Описание <b>*</b>
                                    @error('descriptionInput') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <textarea name="description"
                                class="form-control"
                                id="descriptionInput"
                                cols="30" rows="10"
                                @error('descriptionInput') is-invalid @enderror>
                                    {{ trim($glamping->description) }}
                            </textarea>
                        </div>
                        <button type="submit" class="btn">Обновить данные глемпинга</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
@endsection
