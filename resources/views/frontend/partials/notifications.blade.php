@if(session('notification'))
    <div class="alert alert-warning">
        <p>{{ session('notification') }}</p>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-warning">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session('loginError'))
    <div class="alert alert-warning">
        <p>{{ session('loginError') }}</p>
    </div>
@endif

