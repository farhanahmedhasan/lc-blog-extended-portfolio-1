<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/newsletter', NewsletterController::class);

//Admin Routes
Route::middleware('can:admin')->group(function(){
	Route::resource('/admin/posts', AdminPostController::class)->except('show','destroy','update','edit');
	Route::get('admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit']);
	Route::patch('admin/posts/{post:slug}', [AdminPostController::class, 'update']);
	Route::delete('admin/posts/{post:slug}', [AdminPostController::class, 'destroy']);
});