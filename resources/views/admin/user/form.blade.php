<div class="row">
    @include('admin.partials.errors')
    <div class="col-xs-12 col-md-6">

        <form action="" method="post">
            {{ csrf_field()  }}
            <div class="form-group">
                <label for="first_name">نام :</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name', isset($userItem) ? $userItem->first_name: '') }}">
            </div>
            <div class="form-group">
                <label for="last_name">نام خانوادگی :</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name', isset($userItem) ? $userItem->last_name: '') }}">
            </div>
            <div class="form-group">
                <label for="email">ایمیل :</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email' , isset($userItem) ? $userItem->email: '') }}">
            </div>
            <div class="form-group">
                <label for="password">کلمه عبور :</label>
                <input type="password" class="form-control" name="password" id="password" >
            </div>
            <div class="form-group">
                <label for="role">نقش کاربری  :</label>
                <select name="role" id="role" class="form-control">
                    <option value="1" {{ isset($userItem) && $userItem->role == 1 ? 'selected': ''  }} >کاربر عادی</option>
                    <option value="3" {{ isset($userItem) && $userItem->role == 3 ? 'selected': ''  }} >مدیریت</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phoneNumber">تلفن :</label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber', isset($userItem) ? $userItem->phoneNumber: '') }}">
            </div>

            <div class="form-group">
                <label for="address">آدرس :</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address', isset($userItem) ? $userItem->address : '') }}">
            </div>

            <div class="form-group">
                <label for="postal_code">کذ پستی :</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old('postal_code', isset($userItem) ? $userItem->postal_code: '') }}">
            </div>

            <div class="form-group">
                <button  class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>