<?php

namespace App\Http\Controllers;
use App\Rules\PhoneFormat;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(){
        $title = "Welcome to the site";
        $subtitle = "This is the subtitle";
        $users = ['John', 'Paul', 'George', 'Ringo'];


        return view('index', compact('title', 'subtitle', 'users'));
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
