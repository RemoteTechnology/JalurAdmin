@extends('layouts.base')

@php
    $days = ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Восскресенье"];
@endphp

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container mb-5">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Расписание</h3>
                </div>
                <div class="d-flex justify-content-end">
                    <form id="select_hall" action="#" method="POST" style="margin-right: 2em;">
                        <select id="selection_hall" class="form-select" aria-label="Default select example">
                            @foreach ($halls as $hall)
                                <option value="{{ $hall->id }}" @if($hall->id == $hall_id) selected @endif>{{ $hall->name }}</option>
                            @endforeach
                        </select>
                    </form>
                    <a href="{{ route('schedule.time') }}" class="btn p-right">Добавить время</a>
                    <a href="{{ route('schedule.create', ['hall_id' => $hall_id]) }}" class="btn">Добавить</a>
                </div>
                <div class="mt-4 mb-3">
                    <div id="schedule-menu" class="row">
                        <div class="col-3 mx-auto" style="
                        background-color: #f6f6f6;
                        border-radius: 1em;
                    ">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('schedule.for_hall', ['hall_id' => $hall_id, 'day' => 1, 'month' => $schedules["weeks"]["month_down"], 'year' => $schedules["weeks"]["year_down"]]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: #977585;">
                                        <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                                    </svg>
                                </a>
                                <strong class="col-9 text-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" style="fill: #977585;">
                                            <path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path>
                                        </svg>
                                        <div class="col-1"></div>
                                    </span>
                                    <span>{{ $schedules["weeks"]["month_name"] }}</span>
                                    <span>{{ $schedules["weeks"]["year"] }}</span>
                                </strong>
                                <a href="{{ route('schedule.for_hall', ['hall_id' => $hall_id, 'day' => 1, 'month' => $schedules["weeks"]["month_up"], 'year' => $schedules["weeks"]["year_up"]]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: #977585;">
                                        <path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="weks" class="h-first d-flex justify-content-around">
                    @foreach ($days as $day)
                        <div class="flex-8 card br-0 text-center align-items-center bg-table">
                            <div class="mt-2"></div>
                            <strong class="w-100 d-block">{{ $day }}</strong>
                            <div class="mt-2"></div>
                        </div>
                    @endforeach
                </div>
                @foreach ($schedules["calendar"] as $schedule)
                    <div class="d-flex">
                        @foreach ($schedule as $week)
                            @if (count($week) == 0)
                                <div class="flex-8 card align-items-center bg-table-body br-0"></div>
                            @else
                                <div class="flex-8 card align-items-center bg-table-body br-0">
                                    <div class="mt-2">
                                        <b class="text-center">{{ $week['day'] }}</b>
                                    </div>
                                    <ul class="w-100">
                                        @foreach ($week['works'] as $work)
                                            <li class="mb-2">

                                                <a href="{{ route('schedule.info', [
                                                    'hall_id' => $hall_id,
                                                    'schedule_id' => $work->id,
                                                    'schedule_time_id' => $work->schedule_time_id,
                                                    'couch_id' => $work->couch_id,
                                                    'workout_id' => $work->workout_id
                                                ]) }}">
                                                    <span>{{ mb_substr($work['schedule_time']['start_time'], 0, 5) }}</span>
                                                    <strong>{{ $work['workout']['name'] }}</strong>
                                                    <span>({{ mb_substr($work->coucher['last_name'], 0, 1) }}.{{ $work->coucher['first_name'] }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="mb-2"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script>
            $('#selection_hall').on('change', function(){
                $(this).closest('#select_hall').submit();
            });
        </script>
    @endauth
@endsection
