@extends('master')

@section('title', 'Dang ky')

@section('content')
    <div class="container">
        <h2>Đăng Ký </h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <lable class="form-lable">Họ và Tên</lable>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Poster</label>
                <input type="file" name="avatar"  class="form-control">
                @error('avatar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <lable class="form-lable">Email</lable>
                <input type="email" name="email" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <lable class="form-lable">Mật khẩu</lable>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <lable class="form-lable">Nhập lại mật khẩu</lable>
                <input type="password" name="password_comfirm" class="form-control">
                @error('password_comfirm')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"> Đăng ký </button>
        </form>
    </div>

@endsection
