<?php

namespace App\Http\Controllers;
use App\Rules\PhoneFormat;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;
class mainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $movies = Movie::where('category_id', $id)->get();
        return view('category', compact('category', 'movies'));
    }

    public function movie($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie', compact('movie'));
    }

    public function contacts(){
       return view('contacts');
    }

    public function sendMail(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => ['required', new PhoneFormat()],
        ]);
        //dd($request->name); // получаем только имя из формы
        return redirect()->back()->with('success', 'Your message has been sent');
    }

}
