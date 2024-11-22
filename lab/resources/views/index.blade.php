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
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">View</th>
                    <th scope="col">Category</th>
                    <th scope="col">
                        ssss
                        {{-- <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
                        <a href="{{ route('posts.trash') }}" class="btn btn-primary">Trash</a> --}}
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
                            {{-- <div>
                                <a href="{{ route('posts.edit', $movie->id) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('posts.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn xóa không?')">Delete</button>
                                </form>
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $movies->links() }}
    </div>
@endsection
