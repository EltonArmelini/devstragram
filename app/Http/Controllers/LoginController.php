<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'email' => 'required|email|min:3',
            'password' => 'required',
        ]);
        
        // try login with credentials
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
            return back()->with('mensaje',"Credenciales incorrectas");
        }

        //if is ok auth redirect to post index
        return redirect()->route('posts.index',Auth::user()->username);
    }
}
 