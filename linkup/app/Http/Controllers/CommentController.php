<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;
use Illuminate\Support\Facedes\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Posts $post){
        $validated = $request->validate([
            'content'=> 'required|string|max:500',
        ]);
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'content' => $validated['content'],
        ]);
    }
}
