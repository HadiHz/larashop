@extends('layouts.admin')

@section('content')
    @include('admin.partials.notifications')
    <table class="table table-bordered">
        <thead>
        @include('admin.category.columns')
        </thead>
        @if($categories && count($categories) > 0)

            @foreach($categories as $category)
                @include('admin.category.item',$category)
            @endforeach
            @else
            @include('admin.category.no-item')
        @endif
    </table>
@endsection