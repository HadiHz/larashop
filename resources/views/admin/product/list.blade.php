@extends('layouts.admin')

@section('content')
    @include('admin.partials.notifications')
    @if($products && count($products) > 0)
        <table class="table table-bordered">
            <thead>
                @include('admin.product.columns')
            </thead>
            @foreach($products as $product)
                @include('admin.product.item',$product)
            @endforeach
        </table>
        {{ $products->links() }}
    @endif
@endsection