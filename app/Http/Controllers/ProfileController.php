<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile.index');
    }
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'username' => ['required', 'unique:users,username,' . $userId, 'min:3', 'max:30', 'not_in:edit,devstagram']
        ]);
        $user = User::find($userId);
        $user->username = Str::slug($request->username);
        if ($request->file) {
            $pathImageSave = ImagesController::saveImage($request, "profiles");
            $user->images = $pathImageSave ?? '';
        }
        $user->save();
        return redirect()->route('posts.index', $user->username);
    }
}
