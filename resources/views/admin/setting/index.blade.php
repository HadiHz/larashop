@extends('layouts.admin')
@section('content')
    <div class="row">
        @include('admin.partials.errors')
        @include('admin.partials.notifications')
        <div class="col-xs-6 col-md-6">
            <form action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field()  }}
                <div class="form-group">
                    <label for="name">نام فروشگاه :</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name',isset($setting) ? $setting->name: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="slogan">شعار :</label>
                    <input type="text" class="form-control" name="slogan" id="slogan" value="{{ old('slogan',isset($setting) ? $setting->slogan: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="email">ایمیل :</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email',isset($setting) ? $setting->email: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="phone">تلفن :</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone',isset($setting) ? $setting->phone: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="aboutUs">متن درباره ما  :</label>
                    <textarea name="aboutUs" class="form-control" id="aboutUs" cols="30" rows="10">{{ old('aboutUs',isset($setting) ? $setting->aboutUs: '')  }}</textarea>
                </div>
                <div class="form-group">
                    <label for="contactUs">متن ارتباط با ما  :</label>
                    <textarea name="contactUs" class="form-control" id="contactUs" cols="30" rows="10">{{ old('contactUs',isset($setting) ? $setting->contactUs: '')  }}</textarea>
                </div>


                <div class="form-group">
                    <label for="logoImagePath"  >لوگو :</label>
                    <input type="file"  name="logoImagePath" id="logoImagePath">
                </div>
                <div class="form-group">
                    <button  class="btn btn-success" type="submit">ذخیره اطلاعات</button>
                </div>
            </form>
        </div>
    </div>

@endsection