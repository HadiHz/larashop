@extends('layouts.admin')

@section('content')
    @include('admin.partials.notifications')
    <table class="table table-bordered">
        <thead>
        @include('admin.shippingMethod.columns')
        </thead>
        @if($shippingMethods && count($shippingMethods) > 0)

            @foreach($shippingMethods as $shippingMethod)
                @include('admin.shippingMethod.item',$shippingMethod)
            @endforeach
            @else
            @include('admin.shippingMethod.no-item')
        @endif
    </table>
@endsection