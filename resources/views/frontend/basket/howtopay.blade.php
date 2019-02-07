@extends('layouts.checkout')

@section('steps')
    <div class="checkout-steps">
        <div class="clearfix">
            <div class="step">
                <div class="step-badge">4</div>
                تاييد و پرداخت
            </div>
            <div  class="step active">
                <div class="step-badge">3</div>
                شيوه پرداخت
            </div>
            <div class="step done">
                <div class="step-badge"><i class="icon-ok"></i></div>
                <a href="{{ route('basket.checkAddress') }}">آدرس ارسال</a>
            </div>
            <div class="step done">
                <div class="step-badge"><i class="icon-ok"></i></div>
                <a href="{{ route('basket.review') }}">سبد خريد</a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="radio-inline">
        <label ><input type="radio" name="gateway" checked> درگاه بانک ملت
            <span><img src="/images/mellat.png" alt=""></span>
        </label>
    </div>
@endsection

@section('link')
    <p class="right-align">
        در مرحله بعدي شما قادر هستيد سفارشتان را بازبيني کرده و آن را تاييد کنيد &nbsp; &nbsp;
        <a href="{{ route('basket.confirmAndPay') }}" class="btn btn-primary higher bold">ادامه</a>
    </p>
@endsection