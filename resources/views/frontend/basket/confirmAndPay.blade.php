@extends('layouts.checkout')

@section('steps')
    <div class="checkout-steps">
        <div class="clearfix">
            <div class="step done">
                <div class="step-badge"><i class="icon-ok"></i></div>
                <a href="checkout-step-1.html">سبد خريد</a>
            </div>
            <div class="step done">
                <div class="step-badge"><i class="icon-ok"></i></div>
                <a href="checkout-step-2.html">آدرس ارسال</a>
            </div>
            <div class="step done">
                <div class="step-badge"><i class="icon-ok"></i></div>
                <a href="checkout-step-3.html">شيوه پرداخت</a>
            </div>
            <div class="step active">
                <div class="step-badge">4</div>
                تاييد و پرداخت
            </div>
        </div>
    </div>
@endsection


@section('content')

    <table class="table table-items">
        <thead>
        <tr>
            <th colspan="2">آيتم</th>
            <th>
                <div class="align-center">تعداد</div>
            </th>
            <th>
                <div class="align-right">قيمت</div>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php $items = \App\Utility\Basket::items(); ?>
        @foreach($items as $item)

            <tr>
                <td class="image"><img src="{{ $item['image_path'] }}" alt="" width="124" height="124"/>
                </td>
                <td class="desc">{{ $item['name'] }}</td>
                <td class="qty">
                    {{ $item['count'] }}
                </td>
                <td class="price">
                    {{ $item['price'] }}تومان
                </td>
            </tr>
        @endforeach


        <tr>
            <td colspan="2" rowspan="2">
                &nbsp;
            </td>
            <td class="stronger">هزينه ارسال :</td>
            <td class="stronger">
                <div class="align-right">$4.99</div>
            </td>
        </tr>
        <tr>
            <td class="stronger">جمع کل :</td>
            <td class="stronger">
                <div class="size-16 align-right">$357.81</div>
            </td>
        </tr>
        </tbody>
    </table>

    <p class="right-align">
        <a href="index.html" class="btn btn-primary higher bold">تاييد و پرداخت</a>
    </p>
@endsection