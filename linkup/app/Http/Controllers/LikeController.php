<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Posts $post){
        $userId = Auth::id();
        $existingLike = Like::where('user_id', $userId)
                            ->where('post_id', $post->id)
                            ->first();
        if ($existingLike){
            $existingLike->delete();
            return back()->with('success', 'like retire');
        }else{
            Like::create([
                'user_id' => $userId,
                'post_id' => $post->id
            ]);
        }
    }
}
