@extends('layouts.checkout')
@section('steps')
    <div class="checkout-steps">
        <div class="clearfix">
            <div class="step done">
                <div class="step-badge"><i class="icon-ok"></i></div>
                <a href="checkout-step-1.html">سبد خرید</a>
            </div>
            <div class="step active">
                <div class="step-badge">2</div>
                آدرس ارسال
            </div>
            <div class="step">
                <div class="step-badge">3</div>
                شیوه پرداخت
            </div>
            <div class="step">
                <div class="step-badge">4</div>
                تایید و پرداخت
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('admin.partials.errors')
    <form action="#" method="post" class="form-horizontal form-checkout">
        {{ csrf_field() }}
        <div class="control-group">
            <label class="control-label" for="firstName">نام<span class="red-clr bold">*</span></label>
            <div class="controls">
                <p>{{ auth()->user()->first_name }}</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastName">نام خانوادگی<span class="red-clr bold">*</span></label>
            <div class="controls">
                <p>{{ auth()->user()->last_name }}</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="telephone">تلفن<span class="red-clr bold">*</span></label>
            <div class="controls">
                <input type="tel" name="phoneNumber"  id="telephone" class="span4" required
                value="{{ old('phoneNumber',isset(auth()->user()->phoneNumber) ? auth()->user()->phoneNumber: '')  }}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">ایمیل<span class="red-clr bold">*</span></label>
            <div class="controls">
                <p>{{ auth()->user()->email }}</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="addr1">آدرس کامل<span class="red-clr bold">*</span></label>
            <div class="controls">
                <input type="text" name="address" id="addr1" class="span4" required
                value="{{ old('address',isset(auth()->user()->address) ? auth()->user()->address: '')  }}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="zip">کد پستی<span class="red-clr bold">*</span></label>
            <div class="controls">
                <input type="text" name="postal_code" id="zip" class="span4"
                       value="{{ old('postal_code',isset(auth()->user()->postal_code) ? auth()->user()->postal_code: '')  }}">
            </div>
        </div>

        <p class="right-align">
            در مرحله بعدی شما شیوه پرداخت را انتخاب میکنید &nbsp; &nbsp;
            <button type="submit" class="btn btn-primary higher bold">ادامه</button>
        </p>

    </form>




@endsection
