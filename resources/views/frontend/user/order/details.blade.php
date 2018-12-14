@extends('layouts.user')

@section('content')
    <p>تازیخ سفارش</p>
    <p>{{ jdate($order->created_at) }}</p>
    <hr>
    <h3>محصولات سفارش داده شده</h3>
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
        @foreach($products as $product)

            <tr>
                <td class="image"><img src="{{ $product->image_path }}" alt="" width="124" height="124"/>
                </td>
                <td class="desc">{{ $product->name }}</td>
                <td class="qty">
                    {{ $product->pivot->count }}
                </td>
                <td class="price">
                    {{ $product->price }}تومان
                </td>
            </tr>
        @endforeach


        <tr>
            <td colspan="2" rowspan="2">
                &nbsp;
            </td>
            <td class="stronger">هزينه ارسال :</td>
            <td class="stronger">
                <div class="align-right">{{ $order->shippingMethodCost() }}</div>
            </td>
        </tr>
        <tr>
            <td class="stronger">جمع کل :</td>
            <td class="stronger">
                <div class="size-16 align-right">{{ $order->total_price }} تومان</div>
            </td>
        </tr>
        </tbody>
    </table>
@endsection