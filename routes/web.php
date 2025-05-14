<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [PostController::class, 'index'])->name('home');
    //Route::get('/posts');
    Route::get('/create', [PostController::class, 'showCreatePostForm'])->name('posts.create');
    Route::post('/create', [PostController::class, 'createPost'])->name('posts.store');
});