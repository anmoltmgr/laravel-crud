<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/post-register', [UserController::class, 'PostRegister']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('post-login', [UserController::class, 'postLogin']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


Route::get('/', function () {
    // $posts = Post::where('user_id', auth()->id())->get();
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});
