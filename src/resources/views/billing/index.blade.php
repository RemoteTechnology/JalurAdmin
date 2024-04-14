@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-5">
                    <h3 class="text-center">Покупки клиентов</h3>
                </div>
                <div class="row">
                    <h1 class="text-center" style="color: red;"><b>СТРАНИЦА ПОКА НЕ РАБОТАЕТ</b></h1>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead class="mb-2">
                        <tr>
                            <th scope="col" class="w-22">Дата совершения покупки</th>
                            <th scope="col" class="w-22">
                                Количество занятий<br/>
                                <span class="d-block mt-1">
                                    <i>
                                        <small>(Всего/Осталось)</small>
                                    </i>
                                </span>
                            </th>
                            <th scope="col" class="w-22">Тренировка</th>
                            <th scope="col" class="w-22">Клиент</th>
                            <th scope="col" class="w-45">Сумма оплаты</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $record['record']->created_at }}</td>
                                <td>{{ $record['record']->total_training }}/{{ $record['record']->remaining_training }}</td>
                                <td>
                                    {{ $record['workout']->name }} <br />
                                    <small>({{ $record['type_workout']->name }})</small><br />
                                    <span><b>Тренер:</b> {{ $record['couch']->last_name }} {{ $record['couch']->first_name }}</span>
                                </td>
                                <td>
                                    {{ $record['user']->last_name }} {{ $record['user']->first_name }}
                                    {{ $record['user']->middle_name }} <br/>
                                    <a href="#">
                                        <b>{{ $record['user']->phone }}</b>
                                    </a>
                                </td>
                                <td>
                                    {{ $record['record']->payments['amount']['value'] }}
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         style="fill: rgba(0, 0, 0, 1);">
                                        <path d="M8 21h2v-3h6v-2h-6v-2h4.5c2.757 0 5-2.243 5-5s-2.243-5-5-5H9a1 1 0 0 0-1 1v7H5v2h3v2H5v2h3v3zm2-15h4.5c1.654 0 3 1.346 3 3s-1.346 3-3 3H10V6z"></path>
                                    </svg>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endauth
@endsection
