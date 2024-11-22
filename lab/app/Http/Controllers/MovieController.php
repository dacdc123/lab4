<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::query()->paginate(10);
        return view('index', compact('movies'));
    }

    // public function create() {
    //     $genres = Genre::all();
    //     return view('movies.create', compact('genres'));
    // }

    // public function store(Request $request) {
    //     $validated = $request->validate([
    //         'title' => 'required|unique:movies|max:255',
    //         'poster' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
    //         'intro' => 'required',
    //         'release_date' => 'required|date|after_or_equal:today',
    //         'genre_id' => 'required|exists:genres,id',
    //     ]);

    //     $movie = new Movie($validated);
    //     if ($request->hasFile('poster')) {
    //         $path = $request->file('poster')->store('posters');
    //         $movie->poster = $path;
    //     }
    //     $movie->save();

    //     return redirect()->route('movies.index');
    // }

    // public function edit(Movie $movie) {
    //     $genres = Genre::all();
    //     return view('movies.edit', compact('movie', 'genres'));
    // }

    // public function update(Request $request, Movie $movie) {
    //     $validated = $request->validate([
    //         'title' => 'required|unique:movies,title,' . $movie->id . '|max:255',
    //         'poster' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
    //         'intro' => 'required',
    //         'release_date' => 'required|date|after_or_equal:today',
    //         'genre_id' => 'required|exists:genres,id',
    //     ]);

    //     if ($request->hasFile('poster')) {
    //         $path = $request->file('poster')->store('posters');
    //         $movie->poster = $path;
    //     }
    //     $movie->update($validated);

    //     return redirect()->route('movies.index');
    // }

    // public function destroy(Movie $movie) {
    //     $movie->delete();
    //     return redirect()->route('movies.index');
    // }

    // public function show(Movie $movie) {
    //     return view('movies.show', compact('movie'));
    // }
    // public function search(Request $request) {
    //     $movies = Movie::where('title', 'LIKE', '%' . $request->input('query') . '%')->get();
    //     return view('movies.index', compact('movies'));
    // }
    
}

