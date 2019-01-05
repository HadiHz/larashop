@extends('layouts.admin')

@section('content')
    <p>دریافت آخرین محصولات</p>
    <div class="row">

        <div class="col-xs-12 col-md-6">
            @include('admin.partials.errors')
            @include('admin.partials.notifications')
            @if(session('getError'))
                <div class="alert alert-danger">
                        <p>{{ session('getError') }}</p>
                </div>
            @endif
            <form method="post" action="{{ route('admin.syncProducts') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">ایمیل ادمین :</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور ادمین :</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>


                <p>
                    <button type="submit" class="btn btn-primary">دریافت</button>
                </p>

            </form>
        </div>
    </div>

    <hr>


    <p>ارسال سفارش ها</p>

    <form method="post" action="{{ route('admin.syncOrders') }}">
        {{ csrf_field() }}


        <p>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </p>

    </form>


@endsection