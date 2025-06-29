<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Actor;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::paginate(5);
        return view('admin.movies.index', compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $actors = Actor::all();
        return view('admin.movies.create', compact('categories', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
        ]);
    
        $movie = new Movie();
        $movie->title = $validated['title'];
        $movie->category_id = $validated['category_id'];
    
        if ($request->hasFile('image')) {
            $movie->image = $request->file('image')->store('movies', 'public');
        }
    
        $movie->save();
    
        // Прив’язка акторів
        if (!empty($validated['actors'])) {
            $movie->actors()->sync($validated['actors']); // або ->attach([...])
        }
    
        return redirect()->route('admin.movies.index')->with('success', 'Movie created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $categories = Category::all();
        $actors = Actor::all();
        return view('admin.movies.edit', compact('movie', 'categories', 'actors'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            $movie->image = $request->file('image')->store('movies', 'public');
            $movie->save();
        }

        $movie->actors()->sync($request->actors);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index');
    }
}
