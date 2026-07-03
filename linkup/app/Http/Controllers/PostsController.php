<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::with('user')->latest()->get();
        return view('feed', compact('posts'));
    }
    public function store(StorePostRequest $request){
        $validated = $request->validated();

        $request->user()->Posts()->create([
            'content' => $validated['content'],
        ]);
        return redirect()->route('feed');
    }

    public function update(Request $request, Posts $post){
        if (Auth::id() !== $post->user_id){
            abort(403, 'action non autorisee');
        }

        $request->validate([
            'content' => 'required|string|min:10',
        ]);
        $post->update([
            'content' => $request->content,
        ]);

        return redirect()->route('feed')->with('success', 'Post modifie avec succes');
    }
}
