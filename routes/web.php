<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;

/* Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('posts.index',Auth::user());
    }
    return redirect()->route('login');
}); */

/**
 * ============= HOME  CONTROLLER =============
 */
Route::get('/', HomeController::class)->name('home');


/**
 * ============= PROFILE  CONTROLLER =============
 */
Route::get('/edit', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/edit', [ProfileController::class, 'store'])->name('profile.store');


/**
 * 
 * ============= USER CONTROLLER =============
 *
 */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

/**
 * ============= POST CONTROLLER =============
 * Rutas dinamicas con { :value}
 */
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
/**
 * ============= COMMENTS CONTROLLER =============
 */
Route::post('/{user:username}/post/{post}', [CommentsController::class, 'store'])->name('comments.store');

/**
 * ============= IMAGES  CONTROLLER =============
 */
Route::post('/images', [ImagesController::class, 'store'])->name('images.store');


/**
 * ============= LIKES  CONTROLLER =============
 */
Route::post('/post/{post}/likes', [LikeController::class, 'store'])->name('post.like.store');
Route::delete('/post/{post}/likes', [LikeController::class, 'destroy'])->name('post.like.destroy');


/**
 * ============= FOLLOWERS  CONTROLLER =============
 */
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');