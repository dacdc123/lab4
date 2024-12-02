@extends('master')

@section('title', 'Profile')

@section('content')
    <h1>Danh sách tài khoản</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->active ? 'Kích hoạt' : 'Ngừng hoạt động' }}</td>
                    <td>
                        <form action="/admin/users/{{ $user->id }}/toggle" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">{{ $user->active ? 'Ngừng' : 'Kích hoạt' }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
