<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showregister(){
        return view('auth.register');
    }

    public function showlogin(){
        return view('auth.login');
    }
}
