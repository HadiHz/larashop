@extends('layouts.admin')
@section('content')
    <div class="row">
        @include('admin.partials.errors')
        @include('admin.partials.notifications')

        <div class="col-xs-6 col-md-6">
            <p>تنظیمات مربوط به درگاه بانک ملت</p>
            <form action="{{ route('admin.setting.gateway') }}" method="post" >
                {{ csrf_field()  }}
                <div class="form-group">
                    <label for="mellatTerminalID">terminalID :</label>
                    <input type="text" class="form-control" name="mellatTerminalID" id="mellatTerminalID" value="{{ old('mellatTerminalID',isset($setting) ? $setting->mellatTerminalID: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="mellatUsername">username :</label>
                    <input type="text" class="form-control" name="mellatUsername" id="mellatUsername" value="{{ old('mellatUsername',isset($setting) ? $setting->mellatUsername: '')  }}" >
                </div>

                <div class="form-group">
                    <label for="mellatPassword">password :</label>
                    <input type="text" class="form-control" name="mellatPassword" id="mellatPassword" value="{{ old('mellatPassword',isset($setting) ? $setting->mellatPassword: '')  }}" >
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="ذخیره اطلاعات" >
                </div>
            </form>
        </div>
    </div>

@endsection