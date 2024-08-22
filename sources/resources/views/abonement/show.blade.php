
@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Абонемент "{{ $abonement->title }}"</h3>
                </div>
                <div class="row">
                    <div class="col-5 mx-auto">
                        <form action="{{ route('abonement.form.update') }}" method="post">
                            @csrf
                            <input type="hidden"
                                   name="id"
                                   value="{{ $abonement->id }}">
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Название абонемента</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText"
                                       name="title"
                                       value="{{ $abonement->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTimeOfAction" class="form-label">Срок действия</label>
                                <input type="number"
                                       class="form-control"
                                       id="exampleInputTimeOfAction"
                                       name="time_of_action"
                                       value="{{ $abonement->time_of_action }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPrice" class="form-label">Стоимость</label>
                                <input type="number"
                                       class="form-control"
                                       id="exampleInputPrice"
                                       name="price"
                                       value="{{ $abonement->price }}">
                            </div>
                            <button type="submit" class="btn">Обновить информацию</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
