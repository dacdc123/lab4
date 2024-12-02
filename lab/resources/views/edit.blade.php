@extends('master')

@section('title', 'create post')

@section('content')
    <div class="w-60">
        <form action="{{ route('movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ old('title')  ?? $movie->title }}" class="form-control">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Genes Name</label>
                <select name="genre_id" id="" class="form-control">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected($genre->id === $movie->genre_id)>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Poster</label>
                <img src="{{ Storage::url($movie->poster) }}" width="90" alt="">

                <input type="file" name="poster" class="form-control">
                {{-- @error('poster')
                    <span class="text-danger">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="mb-3">
                <label for="">release_date</label>
                <input type="date" name="release_date" value="{{ old('release_date') ?? $movie->release_date }}" class="form-control">
                {{-- @error('view')
                    <span class="text-danger">{{ $message }}</span>
                @enderror --}}
            </div>
            {{-- <div class="mb-3">
                <label for="">release_date</label>
                <textarea name="release_date" rows="5" class="form-control"></textarea>
            </div> --}}
            <div class="mb-3">
                <label for="">intro</label>
                <textarea name="intro" rows="8" value="{{ old('intro')}}" class="form-control">{{ $movie->intro }}</textarea>
                @error('intro')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('index') }}"  class="btn btn-info">Quay lại </a>

            </div>
        </form>
    </div>
@endsection
