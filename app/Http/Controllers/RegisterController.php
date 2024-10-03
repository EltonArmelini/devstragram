<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required|min:3|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|min:3|max:30',
            'password' => 'required|min:8|confirmed',
        ]);

        //Save on database using Eloquent
        User::create([
            'name'=> trim($request->name),
            'username'=> Str::slug($request->username),
            'email'=> $request->email,
            'password'=> $request->password
        ]);

        //Authenticate user
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);


        // Redirect to Posts 
        return redirect(route('posts.index',Auth::user()->username));
    }

}
