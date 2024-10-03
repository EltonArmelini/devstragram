<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request,User $user, Post $post)
    {   
        //validate data
        $this->validate($request,[
            'comment'=>'required|max:255|min:1'
        ]);
        //save comment
        Comment::create([
            'post_id'=>$post->id,
            'user_id'=>Auth::id(),
            'comment'=>$request->comment
        ]);
        //return back for show comment
        return back()->with('message','Comentario Agregado');
    }
}
