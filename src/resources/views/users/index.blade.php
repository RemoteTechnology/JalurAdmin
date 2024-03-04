@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Пользователи</h3>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn p-right" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Фильтр</button>
                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Параметры фильтра</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form action="{{ route('user.form.filter') }}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="firstNameInput" class="form-label">Введите имя</label>
                                            <input type="text" class="form-control" name="first_name" id="firstNameInput">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="lastNameInput" class="form-label">Введите фамилию</label>
                                            <input type="text" class="form-control" name="last_name" id="lastNameInput">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="phoneInput" class="form-label">Введите номер телефона</label>
                                            <input type="tel" class="form-control" name="phone" id="phoneInput">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Роль</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" value="Клиент" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  Клиент
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" value="Тренер" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Тренер
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" value="Администратор" id="flexRadioDefault3">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    Администратор
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Пол</label>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="Мужчина" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Мужчина
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="Женщина" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Женщина
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Возраст</label>
                                            <section>
                                                <span id="ageCount"></span> <input type="range" class="form-range" min="0" max="100" value="0" name="age" id="rangeInput">
                                            </section>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_schedule" value="ok" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Предстоящая запись
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn w-100 p-2 mt-5">Применить фильтр</button>
                            </form>
                        </div>
                      </div>

                    <a href="{{ route('user.registration') }}" class="btn h-first">Добавить</a>
                </div>
                @if (count($users) == 0)
                    <div class="alert alert-warning" role="alert">Данных нет!</div>
                @else
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ФИО</th>
                            <th scope="col">Номер телефона</th>
                            <th scope="col">Возраст</th>
                            <th scope="col">Параметры</th>
                            <th scope="col">Пол</th>
                            <th scope="col">Количество занятий</th>
                            <th scope="col">Дата регистрации</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>Высота: {{ $user->height }}<br>
                                        Широта: {{ $user->weight }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>
                                        @php  $count = 0; @endphp
                                        @foreach($records as $record)
                                            @if($user->id == $record->user_id)
                                                @php $count++; @endphp
                                            @endif
                                        @endforeach
                                        <span>{{ $count }} на текущий момент</span>
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('user.info', ["id" => $user->id]) }}" class="btn w-100 mb-1">Редактировать</a>
                                        <button type="button"
                                            class="btn w-100 mb-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModalTarget-{{$user->id}}">Цели</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalTarget-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Цели</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (count($targets) != 0)
                                                        <ul class="list-group">
                                                            @foreach ($targets as $target)
                                                                @if($target->user_id == $user->id)
                                                                    <li class="list-group-item">{{$target->collection}}</li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <div class="alert alert-warning" role="alert">Данных нет!</div>
                                                    @endif
                                                </div>
                                            </div>
                                            </div>
                                        </div>
{{--                                        <form action="#" method="post">--}}
{{--                                            <input type="hidden" name="id" value="#">--}}
{{--                                            <button class="btn w-100">Напомнить о уплате</button>--}}
{{--                                        </form>--}}

                                        <button class="btn w-100">Напомнить об оплате</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script type="text/javascript">
            let rangeInput = document.querySelector("#rangeInput");
            let ageCount = document.querySelector("#ageCount");

            rangeInput.addEventListener("input", (event) => {
                const tempSliderValue = event.target.value;
                ageCount.textContent = tempSliderValue;

                // const progress = (tempSliderValue / rangeInput.max) * 100;

                // rangeInput.style.background = `linear-gradient(to right, #f50 ${progress}%, #ccc ${progress}%)`;
            })

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#phoneInput")
                    .mask("+7 (999) 999-99-99");
            });
        </script>
    @endauth
@endsection
