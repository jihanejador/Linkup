<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Posts $posts) { // 👈 البارامتر خاصو يكون $posts بحال الـ Route
        $validated = $request->validate([
            'content'=> 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $posts->id,
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès !');
    }

    public function destroy(Comment $comment) {
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Action non autorisée.');
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé avec succès !');
    }
}
