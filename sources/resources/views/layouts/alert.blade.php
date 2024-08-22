@if(session()->get('success'))
    <div id="alert-form" class="alert alert-success animate__animated animate__fadeInUp" role="alert">{{ session()->get('success') }}</div>
@endif
@if(session()->get('error'))
    <div id="alert-form" class="alert alert-danger animate__animated animate__fadeInUp" role="alert">{{ session()->get('error') }}</div>
@endif
