@extends('master')

@section('title', 'Profile')

@section('content')

    <h1>Thông tin cá nhân</h1>
    <p>
        <img src="{{($user->avatar)}}" width="60" alt="">
    </p>
    <p>Họ tên: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Vai trò: {{ $user->role }}</p>


@endsection
