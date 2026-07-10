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

    }
}
