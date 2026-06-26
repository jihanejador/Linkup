<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts = Post ::with('user')->latest()->get();
        return view('feed', compact('posts'));
    }
}
