<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggle(User $user)
    {
        $me = Auth::user();

        if ($me->id === $user->id) {
            return redirect()->back()->with('error', "Vous ne pouvez pas vous suivre vous-même.");
        }

        if ($me->isFollowing($user)) {
            $me->followings()->detach($user->id);
            $msg = "Vous ne suivez plus " . $user->name;
        } else {
            $me->followings()->attach($user->id);
            $msg = "Vous suivez maintenant " . $user->name;
        }

        return redirect()->back()->with('success', $msg);
    }
}
