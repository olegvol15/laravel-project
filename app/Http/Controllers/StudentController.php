<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'roll_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'fathers_name' => 'required',
            'dob_day' => 'required|numeric',
            'dob_month' => 'required|numeric',
            'dob_year' => 'required|numeric',
            'mobile' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'department' => 'required|array|min:1',
            'course' => 'required',
            'photo' => 'nullable|image|max:2048',
            'city' => 'required',
            'address' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $path;
        }
        
        Session::put('student', $validatedData);
        return redirect()->route('register.confirmation');
    }

    public function confirmation()
    {
        $student = Session::get('student');
        return view('confirmation', compact('student'));
    }
}
