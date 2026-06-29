<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/feed', [PostsController::class, 'index']);

Route::get('/register', [AuthController::class, 'showregister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showlogin'])->name('show.login');
