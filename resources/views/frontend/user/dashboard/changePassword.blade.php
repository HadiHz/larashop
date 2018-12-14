@extends('layouts.user')
@section('content')
    <div class="row">
        @include('frontend.partials.notifications')
        <div class="col-xs-12 col-md-6">
            <form action="" method="post">
                {{ csrf_field()  }}
                <div class="form-group">
                    <label for="old_password">رمز عبور فعلی :</label>
                    <input type="password" class="form-control" name="old_password" id="old_password">
                </div>

                <div class="form-group">
                    <label for="new_password">رمز عبور جدید :</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">ذخیره اطلاعات</button>
                </div>
            </form>
        </div>
    </div>
@endsection