@extends('layouts.user')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>درگاه پرداخت</th>
            <th>شماره رزرو</th>
            <th>کد ارجاع</th>
            <th>شماره ارجاع</th>
            <th>زمان پرداخت</th>
            <th>مبلغ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->gateway_name }}</td>
                <td>{{ $payment->reserve_number }}</td>
                <td>{{ $payment->reference_id }}</td>
                <td>{{ $payment->reference_number }}</td>
                <td>{{ jdate($payment->created_at) }}</td>
                <td>{{ number_format($payment->amount) }} تومان</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection