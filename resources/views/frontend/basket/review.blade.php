@extends('layouts.checkout')

@section('steps')
    <div class="checkout-steps">
        <div class="clearfix">
            <div class="step">
                <div class="step-badge">4</div>
                تایید و پرداخت
            </div>
            <div class="step">
                <div class="step-badge">3</div>
                شیوه پرداخت
            </div>
            <div class="step">
                <div class="step-badge">2</div>
                آدرس ارسال
            </div>
            <div class="step active">
                <div class="step-badge">1</div>
                سبد خرید
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('basket.review') }}" method="post">
        {{ csrf_field() }}
    <table class="table table-items">
        <thead>
        <tr>
            <th colspan="2">آیتم</th>
            <th>
                <div class="align-center">تعداد</div>
            </th>
            <th>
                <div class="align-right">قیمت</div>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php $items = \App\Utility\Basket::items(); ?>
        @foreach($items as $item)
            <tr>
                <td class="image"><img  src="{{ $item['image_path'] }}" alt="" width="124" height="124"/>
                </td>
                <td class="desc">{{ $item['name'] }}<a data-pid="{{ $item['id'] }}" title="Remove Item" class="remove_item" href="#"><span class="fa fa-remove"></span></a>
                </td>
                <td class="qty">
                    <input type="text" name="count[]" class="tiny-size" value="{{ $item['count'] }}"/>
                    <input type="hidden" name="ids[]" class="tiny-size" value="{{ $item['id'] }}"/>
                </td>
                <td class="price">
                    {{ $item['price'] }} تومان
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" rowspan="2">
                <div class="alert alert-info">
                    @foreach($shippingMethods as $shippingMethod)
                        <div class="radio">
                            <label><input type="radio" class="shipping" name="shipM" value="{{ $shippingMethod->id }}">{{ $shippingMethod->name }}
                            <span>هزینه {{ $shippingMethod->cost }} تومان</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </td>
            <td  class="stronger">هزینه ارسال :</td>
            <td class="stronger">
                <div id="shipCost" class="align-right">{{ isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : '' }}</div>
            </td>
        </tr>
        <tr>
            <td class="stronger">جمع کل :</td>
            <td  class="stronger">
                <?php $shippingCost = isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : 0;
                $total = \App\Utility\Basket::total_price() + $shippingCost; ?>
                <div id="total" class="size-16 align-right">{{ $total }} تومان </div>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

@section('link')
    <p class="right-align">
        در مرحله بعدی شما آدرس ارسال را انتخاب خواهید کرد. &nbsp; &nbsp;
        <button type="submit"  class="btn btn-primary higher bold">ادامه</button>
    </p>
    </form>
    @include('admin.partials.errors')
@endsection