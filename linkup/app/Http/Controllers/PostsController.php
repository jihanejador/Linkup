<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::with('user')->latest()->get();
        return view('feed', compact('posts'));
    }
}
