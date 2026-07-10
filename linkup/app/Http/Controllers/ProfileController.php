<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(User $user){
        $user->load('posts.likes', 'posts.comments');
        return view('profile', compact('user'));
    }
    public function edit(){
        $user = Auth::user();
        return view('profile-edit', compact('user'));
    }
    public function update(Request $request){
        $user = Auth::user();
        $request->validate([
            'headline' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);
        $user->update([
            'headline' => $request->headline,
            'company' => $request->company,
        ]);
        return redirect()->route('profile_show)', $user->id)->with('success', 'Profil mis a jour avec succes !');
    }
}
