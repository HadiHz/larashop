@extends('layouts.user')

@section('content')
    <div class="row">
        @include('admin.partials.errors')
        @include('admin.partials.notifications')
        <div class="col-xs-12 col-md-6">
            <form action="#" method="post">
                {{ csrf_field()  }}
                <div class="form-group">
                    <label for="first_name">نام :</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name',isset($currentUser) ? $currentUser->first_name: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="last_name">نام خانوادگی :</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name',isset($currentUser) ? $currentUser->last_name: '')  }}" >
                </div>
                <div class="form-group">
                    <label for="email">ایمیل :</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email',isset($currentUser) ? $currentUser->email: '')  }}" >
                </div>
                <div class="form-group">
                    <label for="phoneNumber">شماره تلفن :</label>
                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber',isset($currentUser) ? $currentUser->phoneNumber: '')  }}" >
                </div>
                <div class="form-group">
                    <label for="address">آدرس :</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address',isset($currentUser) ? $currentUser->address: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="postal_code">کد پستی :</label>
                    <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old('postal_code',isset($currentUser) ? $currentUser->postal_code: '')  }}" >
                </div>

                <div class="form-group">
                    <button  class="btn btn-success" type="submit">ذخیره اطلاعات</button>
                </div>

            </form>
        </div>
    </div>
@endsection