<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller implements HasMiddleware
{

    /* implementar auth en ciertos endpoints/metodos
    uses:
    use Illuminate\Routing\Controllers\Middleware;
    use Illuminate\Routing\Controllers\HasMiddleware;
    agregar el middleware en el constructor: $this->middleware('auth');
    crear el metodo middleware y retornar los metodo que no requieren o excluyen el middleware: new Middleware('auth', only: ['create']) 
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show', 'index']),
        ];
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(12);
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function create(User $user)
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required|min:1|max:255",
            "description" => "required|min:3",
            "image" => "required"
        ]);


        /*         
        // Asignacion Masiva
        Post::create([
            "title" => $request->title,
            "image" => $request->image,
            "description" => $request->description,
            "user_id" => Auth::user()->id
        ]);
        // Asignar los atributos manualmente
        $post = new Post();
        $post->title = $request->title;
        $post->image = $request->image;
        $post->description = $request->description;
        $post->user_id = Auth::user()->id; // Asignar el ID del usuario autenticado

        // Guardar el modelo en la base de datos
        $post->save(); 
        */
        $request->user()->posts()->create([
            "title" => $request->title,
            "image" => $request->image,
            "description" => $request->description,
            "user_id" => Auth::user()->id
        ]);


        return redirect()->route('posts.index', Auth::user()->username);
    }
    public function show(User $user, Post $post)
    {
        return view('posts.show', ['post' => $post, 'user' => $user]);
    }
    public function destroy(Post $post)
    {
        //Check if the user is owner of post to delete
        Gate::allows('delete', $post);
        $post->delete();
        // remove image of filesystem
        $path = public_path('img/posts/'.$post->image);
        if(File::exists($path)){
            unlink($path);
        }
        return redirect()->route('posts.index', Auth::user()->username);
    }
}
