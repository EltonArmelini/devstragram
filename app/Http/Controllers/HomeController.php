<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        $usersId = Auth::user()->following->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $usersId)->latest()->paginate(10);

        return view('home', ['posts' => $posts]);
    }
}
