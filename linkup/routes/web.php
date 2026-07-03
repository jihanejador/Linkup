<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/feed', [PostsController::class, 'index'])->name('feed');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    

});


Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class, 'showregister'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showlogin'])->name('show.login');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

});

