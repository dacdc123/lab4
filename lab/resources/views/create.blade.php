@extends('master')

@section('title', 'create post')

@section('content')
    <div class="w-60">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Genes Name</label>
                <select name="genre_id" id="" class="form-control">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Poster</label>
                <input type="file" name="poster"  class="form-control">
                @error('poster')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">release_date</label>
                <input type="date" name="release_date" value="{{old('release_date')}}"  class="form-control">
                @error('release_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
          
            <div class="mb-3">
                <label for="">intro</label>
                <textarea name="intro" rows="8"  value="{{ old('intro')}}" class="form-control"></textarea>
                @error('intro')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create New</button>
                <a href="{{ route('index') }}"  class="btn btn-info">Quay lại </a>
                
            </div>
        </form>
    </div>
@endsection
