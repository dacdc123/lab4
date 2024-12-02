@extends('master')

@section('title', 'Danh sách sản phẩm')

@section('content')
    @session('message')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endsession
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Intro</th>
                    <th scope="col">Release_date</th>
                    <th scope="col">Genre_id</th>
                    <th scope="col">
                        <a href="{{ route('create') }}" class="btn btn-primary">THeem </a>
                    </th>
                    <th>
                        <a href="{{ route('movies.trash') }}" class="btn btn-primary">Login</a>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <th scope="row">{{ $movie->id }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>
                            <img src="{{ Storage::url($movie->poster) }}" width="60" alt="">
                        </td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>
                            <div>
                                <a href="{{ route('edit', ['movie' => $movie->id]) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn xóa không?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $movies->links() }}
    </div>
@endsection
