@extends('layouts.user')

@section('content')
    @if($orders && count($orders) > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>وضعیت</th>
                <th>مبلغ کل</th>
                <th>روش پست</th>
                <th>تاریخ</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_status_format() }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->shippingMethodName() }}</td>
                    <td>{{ jdate($order->created_at) }}</td>
                    <td><a href="{{ route('user.showOrderDetails' , $order->id) }}">جزییات سفارش</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection