@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Пользователи</h3>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{ route('user.index') }}" class="btn">Назад</a>
                    <a href="{{ route('user.registration') }}" class="btn">Добавить</a>
                </div>
                <div class="col-6 mb-5 mx-auto">
                    <form action="{{ route('user.form.update') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label for="phoneInput"
                                class="form-label">
                                    Введите номер телефона <b>*</b>
                                    @error('phone') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="tel"
                                class="form-control"
                                name="phone"
                                id="phoneInput"
                                value="{{ $user->phone }}"
                                @error('phone') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">
                                Введите адрес электронной почты
                                @error('email') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   id="emailInput"
                                   value="{{ $user->birth_date }}"
                                   @error('email') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="firstNameInput"
                                class="form-label">
                                    Введите имя <b>*</b>
                                    @error('first_name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="text"
                                class="form-control"
                                name="first_name"
                                id="firstNameInput"
                                value="{{ $user->first_name }}"
                                @error('first_name') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="lastNameInput"
                                class="form-label">
                                    Введите фамилию <b>*</b>
                                    @error('last_name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="text"
                                class="form-control"
                                name="last_name"
                                id="lastNameInput"
                                value="{{ $user->last_name }}"
                                @error('last_name') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="middleNameInput"
                                class="form-label">
                                    Введите отчество
                                    @error('last_name') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="text"
                                class="form-control"
                                name="middle_name"
                                id="middleNameInput"
                                value="{{ $user->middle_name }}"
                                @error('middle_name') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="ageInput" class="form-label">
                                Введите возраст <b>*</b>
                                @error('age') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="text"
                                class="form-control"
                                name="age"
                                id="ageInput"
                                value="{{ $user->age }}"
                                @error('age') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="birthDateInput" class="form-label">
                                Укажите дату рождения
                                @error('birth_date') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="date"
                                   class="form-control"
                                   name="birth_date"
                                   id="birthDateInput"
                                   value="{{ $user->birth_date }}"
                                   @error('birth_date') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label class="form-label">
                                        Укажите пол <b>*</b>
                                        @error('gender') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="gender"
                                            value="Мужчина"
                                            @error('gender') is-invalid @enderror
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Мужчина
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="gender"
                                            id="flexRadioDefault2"
                                            value="Женщина"
                                            @error('gender') is-invalid @enderror
                                            checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Женщина
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <label class="form-label">
                                        Укажите роль
                                        @error('role') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    </label>
                                    <select onchange="roleRead()"
                                        class="form-select"
                                        name="role"
                                        id="roleSelection"
                                        aria-label="Default select example"
                                        @error('gender') is-invalid @enderror>
                                            <option value="Клиент">Клиент</option>
                                            <option value="Тренер">Тренер</option>
                                            <option value="Администратор">Администратор</option>
                                            <option value="Руководитель">Руководитель</option>
                                            <option value="Клиент-менеджер">Клиент-менеджер</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <section id="human_client" style="display: @if($user->role == 'Клиент') block @else none @endif">
                            <div class="mb-5">
                                <label class="form-label">
                                    Укажите параметры <b>*</b>
                                    @error('weight') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                    @error('height') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text"
                                            class="form-control"
                                            name="weight"
                                            placeholder="Ширь"
                                            value="{{ $user->weight }}"
                                            @error('weight') is-invalid @enderror>
                                    </div>
                                    <div class="col-6">
                                        <input type="text"
                                            class="form-control"
                                            name="height"
                                            placeholder="Высь"
                                            value="{{ $user->height }}"
                                            @error('height') is-invalid @enderror>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="card p-2 text-center">
                                    <h4>Цели</h4>
                                    @if ($target)
                                        <p class="mt-3">{{ $target->collection }}</p>
                                    @else
                                        <p class="mt-3">Данных нет</p>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <section id="human_couch" style="display: @if($user->role == 'Тренер') block @else none @endif">
                            <div class="mb-3">
                                <label for="sizeClotchInput"
                                    class="form-label">
                                        Укажите размер одежды <b>*</b>
                                        @error('size_cloth') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <input type="text"
                                    class="form-control"
                                    name="size_cloth"
                                    id="sizeClotchInput"
                                    placeholder="На пример 55"
                                    value="{{ $user->size_cloth }}"
                                    @error('size_cloth') is-invalid @enderror>
                            </div>
                            <div class="mb-3">
                                <label for="descriptionInput"
                                    class="form-label">
                                        Укажите описание тренера для клиента <b>*</b>
                                        @error('description') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <textarea name="description"
                                    id="descriptionInput"
                                    cols="30" rows="10"
                                    class="form-control"
                                    @error('description') is-invalid @enderror>
                                        {{ $user->description }}
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imageInput"
                                    class="form-label">
                                        Укажите фотографию тренера <b>*</b>
                                        @error('image') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                                </label>
                                <input type="file"
                                    class="form-control"
                                    name="image"
                                    id="imageInput"
                                    @error('description') is-invalid @enderror>
                            </div>
                        </section>
                        <button type="submit" class="btn">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#phoneInput")
                    .mask("+7 (999) 999-99-99");
            });
        </script>
        <script type="text/javascript">
            function roleRead()
            {
                if ($('#roleSelection').val() == 'Тренер')
                {
                    document.querySelector('#human_client').style.display = "none";
                    document.querySelector('#human_couch').style.display = "block";
                }
                else
                {
                    document.querySelector('#human_client').style.display = "block";
                    document.querySelector('#human_couch').style.display = "none";
                }
            }
        </script>
    @endauth
@endsection
