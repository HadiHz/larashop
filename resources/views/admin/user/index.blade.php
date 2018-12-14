@extends('layouts.admin')

@section('content')
    @include('admin.partials.notifications')
    @if($users && count($users) > 0)
        <table class="table table-bordered">
            <thead>
            @include('admin.user.columns')
            </thead>
            @foreach($users as $user)
                @include('admin.user.item',$user)
            @endforeach
        </table>
        {{ $users->links() }}
    @endif
@endsection