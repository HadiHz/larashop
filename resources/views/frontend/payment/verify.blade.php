@extends('layouts.frontend')
@section('content')
    @include('frontend.partials.notifications')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>درگاه پرداخت</th>
            <th>ResCode</th>
            <th>کد پیگیری</th>
            <th>شماره فاکتور</th>
            <th>کد ارجاع</th>
            <th>زمان پرداخت</th>
            <th>مبلغ</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>ملت</td>
            <td>{{ $params['ResCode'] }}</td>
            <td>{{ $params['SaleOrderId'] }}</td>
            <td>{{ $params['SaleReferenceId'] }}</td>
            <td>{{ $params['RefId'] }}</td>
            <td>{{ jdate($payment->created_at) }}</td>
            <td>{{ $payment->amount }}</td>
        </tr>
        </tbody>
    </table>
@endsection