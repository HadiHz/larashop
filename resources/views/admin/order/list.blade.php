@extends('layouts.admin')

@section('content')
    @include('admin.partials.notifications')
    <table class="table table-bordered">
        <thead>
        @include('admin.order.columns')
        </thead>
        @if($orders && count($orders) > 0)

            @foreach($orders as $order)
                @include('admin.order.item',$order)
            @endforeach
            @else
            @include('admin.order.no-item')
        @endif
    </table>
@endsection