<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Review::create([
            'author' => $request->input('author'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('reviews.index')
            ->with('success', 'Дякуємо за ваш відгук!');
    }
}
