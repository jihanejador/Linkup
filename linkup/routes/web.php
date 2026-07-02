<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/feed', [PostsController::class, 'index'])->name('feed');

Route::get('/register', [AuthController::class, 'showregister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showlogin'])->name('show.login');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
