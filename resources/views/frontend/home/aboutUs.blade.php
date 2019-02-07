@extends('layouts.frontend')

@section('content')
    <p>{{ $setting->aboutUs }}</p>
    <p>ایمیل: {{ $setting->email }}</p>
    <p>شماره تلفن: {{ $setting->phone }}</p>
@endsection