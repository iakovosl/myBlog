<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

use App\Http\Controllers\CommentsController;

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

Route::any('/edit_post/{post}', [PostsController::class,'edit_post'])->name('post.edit')->middleware('auth');

Route::any('/delete_post/{post}', [PostsController::class,'delete_post'])->name('post.delete');

Route::any('/newcomment/{post}', [CommentsController::class,'new_comment'])->name('newcomment')->middleware('auth');
