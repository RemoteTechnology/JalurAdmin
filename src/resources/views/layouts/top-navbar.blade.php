@auth
    <div class="row shadow-bottom p-2">
        <div class="d-flex justify-content-end">
            <div class="row w-25">
                <div class="col-4 d-flex justify-content-center align-items-center"></div>
                <div class="col-8">
                    <div>
                        <span>{{ auth()->user()["last_name"] }} {{ auth()->user()["first_name"] }}</span>
                    </div>
                    <div>
                        <span>Тел. <b>{{ auth()->user()["phone"] }}</b></span>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <form action="{{ route('user.form.logout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="end">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(210, 54, 54, 1);">
                                <path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
                                <path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path>
                            </svg>
                        </span>
                        <span>Выход</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endauth
