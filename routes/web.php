<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [PostsController::class,'index'])->name('posts')->middleware('auth');

Route::any('/post/{post}', [PostsController::class,'post'])->name('post')->middleware('auth');

Route::get('/userposts', [PostsController::class,'userposts'])->name('userposts')->middleware('auth');

Route::any('/newpost', [PostsController::class,'newpost'])->name('newpost')->middleware('auth');

Route::any('/search', [PostsController::class,'search'])->name('search');
