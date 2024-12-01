@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-12">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-9 mb-4">
                    <h1 class="text-center">
                        <strong>Добро пожаловать!</strong>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-4 mx-auto mb-5">
                        <section class="mb-3">
                            <p>
                                Здравствуйте, дорогой администратор, данная панель администратора поможет вам в составлении расписаний для тренировок,
                                в управлении пользователями, назначать выездные глемпинг треннировки, управлять залами и многое другое. Для более
                                детального ознакомления с панелью администратора Jalur вы можете ознакомиться просмотрев видео:
                            </p>
                        </section>
                        <section class="w-50 mx-auto">
                            <img src="{{ asset('/images/jalur_logo.jpg') }}"
                                alt="Jalur"
                                class="img-fluid rounded-3">
                            <span class="play pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="2 4 18 18" style="fill: rgb(242, 242, 242);">
                                    <path d="M7 6v12l10-6z"></path>
                                </svg>
                            </span>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe class="w-100 h45"
                                            src="https://www.youtube.com/embed/ZabHpTV1ff4"
                                            title="NightStop  - Hooker Havoc"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </section>
                        <section class="mt-3">
                            <p>Вы моежте задать интересующий вас вопрос по панели администратора, разработчику.</p>
                            <a href="https://t.me/mironov_vo" class="btn">Задать вопрос</a>
                        </section>
                        <section class="mt-3">
                            <p>Вы моежте задать интересующий вас вопрос по мобильному приложению, разработчику.</p>
                            <a href="https://t.me/TheEndliar" class="btn">Задать вопрос</a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
