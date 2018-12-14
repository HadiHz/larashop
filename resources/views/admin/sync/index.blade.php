@extends('layouts.admin')

@section('content')
    <p>دریافت آخرین محصولات</p>
    <p><a class="btn btn-primary" href="{{ route('admin.syncProducts') }}"> دریافت </a></p>

    <hr>


@endsection