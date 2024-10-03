@auth
    @php
        $page_lists = [
            ["title" => "Расписание", "url" => route('schedule.index'), "active" => $title == "Расписание" ? true : false],
            ["title" => "Абонементы", "url" => route('abonement.index'), "active" => $title == "Абонементы" ? true : false],
            ["title" => "Залы", "url" => route('hall.index'), "active" => $title == "Залы" ? true : false],
            ["title" => "Глемпинг", "url" => route('glamping.index'), "active" => $title == "Глемпинг" ? true : false],
            ["title" => "Тренировки", "url" => route('workout.index'), "active" => $title == "Тренировки" ? true : false],
            /* ["title" => "История покупок", "url" => route('record.index'), "active" => $title == "История покупок" ? true : false], */
            ["title" => "Пользователи", "url" => route('user.index'), "active" => $title == "Пользователи" ? true : false],
        ];
    @endphp
    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 d-xxl-block d-xl-block d-lg-block d-md-block d-sm-none d-none navigate">
        <div class="container mt-5 mb-5">
            <a href="{{ route('home') }}">
                <div class="row">
                    <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <img
                            src="{{ asset('/images/jalur_logo.jpg') }}"
                            alt="logo JALUR"
                            id="logo-img"
                            class="img-fluid rounded-circle">
                    </div>
                    <div class="col-xxl-8 col-xl-9 col-lg-9 col-md-12 col-12">
                        <h3 id="menu-text" class="text-light mt-4">
                            Панель<br>
                            администратора
                        </h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="row p-5 navigate-list">
            <section class="mt-5">
                @foreach ($page_lists as $page)
                        <div class="row mb-3 h-first">
                            <a href="{{ $page['url'] }}" class="btn d-flex justify-content-center align-items-center w-100 @if ($page['active']) active @endif">
                                <span>{{ $page['title'] }}</span>
                            </a>
                        </div>
                @endforeach
        </section>
        </div>
    </div>
@endauth
