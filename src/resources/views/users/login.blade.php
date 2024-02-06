@extends('layouts.base')

@section('content')
    @guest
        <div id="content" class="col-12 bg h-100 d-flex justify-content-center align-items-center">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-7 col-sm-8 col-10 mx-auto card p-5">
                    <div class="mt-2 col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-5 col-5 mx-auto">
                        <img
                            src="{{ asset('/storage/images/jalur_logo.jpg') }}"
                            alt="logo JALUR"
                            id="logo-img"
                            class="img-fluid rounded-circle h-64">
                    </div>
                    <div class="mt-3 mb-4">
                        <h3 class="text-center">Вход</h3>
                    </div>
                    <form action="{{ route('user.form.auth') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="phoneInput"
                                class="form-label">
                                    Введите номер телефона <b>*</b>
                                    @error('phone') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="tel"
                                id="phoneInput"
                                name="phone"
                                autocomplete="off"
                                class="form-control"
                                value="{{ old('phone') }}"
                                @error('phone') is-invalid @enderror>
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput"
                                class="form-label">
                                    Введите парроль администратора <b>*</b>
                                    @error('password_admin') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            </label>
                            <input type="password"
                                id="passwordInput"
                                name="password_admin"
                                autocomplete="off"
                                class="form-control"
                                value="{{ old('email') }}"
                                @error('password_admin') is-invalid @enderror>
                        </div>
                        <div class="d-flex justify-content-between w-100">
                            <div class="col-xxl-4 col-xl-6 col-8">
                                <a href="{{ route('user.reset') }}">У вас нет пароля?</a>
                            </div>
                            <button type="submit" class="btn">Войти</button>
                        </div>
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
    @endguest
@endsection
