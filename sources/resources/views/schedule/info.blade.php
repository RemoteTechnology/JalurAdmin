@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container mb-9 mt-12">
                <div class="row">
                    <div class="col-2">
                        <p>Дата: <strong>{{ mb_substr($schedule->date, 0, 10) }}</strong></p>
                        <p>Время: <strong>{{ mb_substr($schedule_time->start_time, 0, 5) }}</strong></p>
                        <p>Тренер: <strong>{{ $coucher->last_name }} {{ $coucher->first_name }} {{ $coucher->middle_name }}</strong></p>
                    </div>
                    <div class="col-8 d-flex justify-content-center  align-items-center">
                        <h4>{{ $workout['name'] }}</h4>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn w-100 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Записать клиента</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Клиенты</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('record.form.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="schedule_id" value="{{ $schedule_id }}">
                                        <ul class="list-group list-group-flush mb-3">
                                            @foreach ($users as $user)
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            name="users[]"
                                                            type="checkbox"
                                                            value="{{ $user->id }}"
                                                            @foreach ($clients as $client)
                                                                @if($client->id == $user->id)
                                                                    checked
                                                                @endif
                                                            @endforeach
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label w-100" for="flexCheckDefault">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    {{ mb_substr($user->last_name, 0, 1) }}.
                                                                    @if($user->middle_name)
                                                                        {{ mb_substr($user->middle_name, 0, 1) }}.
                                                                    @endif
                                                                    {{ $user->first_name }}
                                                                </div>
                                                                <div>Тел. {{ $user->phone }}</div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <button type="submit" class="btn">Записать</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <a href="{{ route('schedule.update', ['hall_id' => $hall->id, 'schedule_id' => $schedule->id]) }}" class="btn w-100 mb-2">Изменить</a>
                        <form action="{{ route('schedule.form.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $schedule->id }}">
                            <button type="submit" class="btn btn-del w-100">Удалить</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <h4 class="text-center">Записаные клиенты</h4>
                    </div>
                    @if (count($clients) != 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ФИО</th>
                                <th scope="col">Номер телефона</th>
                                <th scope="col">Эл. почта</th>
                                <th scope="col">Возраст</th>
                                <th scope="col">Пол</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->last_name }} {{ $client->first_name }} {{ $client->middle_name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>
                                            @if ($client->email)
                                                {{ $client->email }}
                                            @endif
                                        </td>
                                        <td>{{ $client->age }}</td>
                                        <td>{{ $client->gender }}</td>
                                        <td>
                                            <form action="{{ route('record.form.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $client->id }}">
                                                <button type="submit" class="btn btn-del">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Данных нет!</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endauth
    <script>

    </script>
@endsection
