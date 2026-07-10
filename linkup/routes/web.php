<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/feed', [PostsController::class, 'index'])->name('feed');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/users/{user}/follow', [FollowController::class, 'toggle'])->name('user.follow');

    Route::post('/posts/{posts}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like')->middleware('auth');
    Route::get('/users/{user}', [ProfileController::class, 'show'])->name('profile_show')->middleware('auth');
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class, 'showregister'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showlogin'])->name('login');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});
