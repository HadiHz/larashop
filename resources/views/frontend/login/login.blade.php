@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.notifications')
    <form method="post" action="{{ route('doLogin') }}">
        {{ csrf_field() }}
        <div class="control-group">
            <label class="control-label hidden shown-ie8" for="inputEmail">ایمیل</label>
            <div class="controls">
                <input type="email" name="email" class="" id="inputEmail" placeholder="ایمیل">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label hidden shown-ie8" for="inputPassword">رمز عبور</label>
            <div class="controls">
                <input type="password" name="password" class="" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <label class="checkbox-inline">
                    <input name="remember" type="checkbox">
                    مرا به خاطر بسپار
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary bold higher">
            ورود
        </button>
    </form>
@endsection