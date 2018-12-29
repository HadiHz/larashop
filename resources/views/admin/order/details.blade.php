@extends('layouts.admin')

@section('content')
    <p>تازیخ سفارش</p>
    <p>{{ jdate($order->created_at) }}</p>
    <hr>
    <p>وضعیت سفارش</p>
    <p>{{ $order->order_status_format() }}</p>
    <form method="post" action="#">
        {{ csrf_field() }}
    <div class="form-group">
        <label for="status">وضعیت  :</label>
        <select name="status" id="status" class="form-control">
            <option value="3" {{ isset($order) && $order->status == 3 ? 'selected': ''  }} >در صف بررسی</option>
            <option value="4" {{ isset($order) && $order->status == 4 ? 'selected': ''  }} >تایید سفارش</option>
            <option value="5" {{ isset($order) && $order->status == 5 ? 'selected': ''  }} >آماده سازی سفارش</option>
            <option value="6" {{ isset($order) && $order->status == 6 ? 'selected': ''  }} >خروج از مرکز پردازش</option>
            <option value="7" {{ isset($order) && $order->status == 7 ? 'selected': ''  }} >تحویل به پست</option>
            <option value="8" {{ isset($order) && $order->status == 8 ? 'selected': ''  }} >تحویل مرسوله به مشتری</option>
        </select>
    </div>
        <p><button type="submit" class="btn btn-primary">به روز رسانی</button></p>
    </form>
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