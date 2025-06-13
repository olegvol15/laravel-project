<?php

namespace App\Http\Controllers;

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

}
