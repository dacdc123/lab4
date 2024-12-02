<?php

namespace App\Http\Controllers;

use App\Http\Requests\StogeRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::query()
            ->latest()
            ->paginate(10);
        return view('index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('create', compact('genres'));
    }

    public function store(StogeRequest $request)
    {

        $data = $request->except('poster');

        //upload ảnh
        if ($request->hasFile('poster')) {
            $path_image = $request->file('poster')->store('images');
            $data['poster'] = $path_image;
        }

        Movie::query()->create($data);
        return redirect()
            ->route('index')
            ->with('message', 'Thêm dữ liệu thành công');
    }

    public function destroy($id)
    {
        Movie::query()->find($id)->delete();
        return redirect()->route('index')->with('message', 'Xóa dữ liệu thành công');
    }

    public function edit($id)
    {
        $movie = Movie::query()->find($id);

        $genres = Genre::all();
        return view('edit', compact('movie', 'genres'));
    }

    public function update(StogeRequest $request, $id)
    {
        $movie = Movie::query()->find($id);

        $data = $request->except('poster');

        //upload ảnh
        if ($request->hasFile('poster')) {
            $path_image = $request->file('poster')->store('images');
            $data['poster'] = $path_image;
        }

        $movie->update($data);

        return redirect()
            ->route('index')
            ->with('message', 'Cập nhật dữ liệu thành công');
    }

    // public function trash()
    // {
    //     $movies = Movie::onlyTrashed()->paginate(10);
    //     return view('index', compact('movies'));
    // }

    // public function remove($id) {}


    // public function show(Movie $movie) {
    //     return view('movies.show', compact('movie'));
    // }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = [];

        if ($query) {
            $movies = Movie::where('title', 'LIKE', '%' . $query . '%')->with('genre')->get();
        }

        return view('index', compact('movies'));
    }
}
