@extends('layouts.admin')

@section('content')
    @include('admin.partials.notifications')
    <table class="table table-bordered">
        <thead>
        @include('admin.payment.columns')
        </thead>
        @if($payments && count($payments) > 0)

            @foreach($payments as $payment)
                @include('admin.payment.item',$payment)
            @endforeach
            @else
            @include('admin.payment.no-item')
        @endif
    </table>
@endsection