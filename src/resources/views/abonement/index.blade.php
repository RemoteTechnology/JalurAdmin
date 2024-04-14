@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="row">
                    <div class="mt-9 mb-3">
                        <h3 class="text-center">Добавить абонемент</h3>
                    </div>
                    <div class="col-5 mx-auto mb-3">
                        <form action="{{ route('abonement.form.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Введите название абонемента</label>
                                <input type="text"
                                       class="form-control"
                                       name="title"
                                       id="exampleInputText">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTimeOfAction" class="form-label">Укажите срок действия</label>
                                <input type="number"
                                       class="form-control"
                                       name="time_of_action"
                                       id="exampleInputTimeOfAction">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPrice" class="form-label">Укажите стоимость</label>
                                <input type="number"
                                       class="form-control"
                                       name="price"
                                       id="exampleInputPrice">
                            </div>
                            <button type="submit" class="btn">Создать</button>
                        </form>
                    </div>
                    <hr>
                </div>
                <div class="mt-3 mb-5">
                    <h3 class="text-center">Все абонементы</h3>
                </div>
                <div class="mt-5">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Наименование абонемента</th>
                                <th scope="col">Срок действия</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abonements as $abonement)
                                <tr>
                                    <td>
                                        <a href="{{ route('abonement.show', ['id' => $abonement->id]) }}">{{ $abonement->title }}</a>
                                    </td>
                                    <td>{{ $abonement->time_of_action }}</td>
                                    <td>{{ $abonement->price }}</td>
                                    <td>
{{--                                        <section class="d-flex justify-content-center align-items-center w-100">--}}
                                            <a href="{{ route('abonement.show', ["id" => $abonement->id]) }}"
                                               class="btn w-100 mb-2">Редактировать</a>
                                            <form action="{{ route('abonement.form.delete', ['id' => $abonement->id]) }}"
                                                  method="get">
                                                @csrf
                                                <button type="submit" class="btn w-100">Удалить</button>
                                            </form>
{{--                                        </section>--}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endauth
@endsection
