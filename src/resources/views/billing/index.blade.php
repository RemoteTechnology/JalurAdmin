@extends('layouts.base')

@section('content')
    @auth
        <div id="content" class="col-lg-9">
            @include('layouts.top-navbar')
            <div class="container">
                <div class="mt-5 mb-5">
                    <h3 class="text-center">Покупки клиентов</h3>
                </div>
                <div class="row">
                    123
                </div>
            </div>
        </div>
    @endauth
@endsection
