<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function follow($id)
    {
        $followed_user = User::find($id);
        Auth::user()->following()->attach($followed_user);
        return back();
    }

    public function unfollow($id)
    {
        $followed_user = User::find($id);
        Auth::user()->following()->detach($followed_user);
        return redirect()->back();
    }

    public function following($id)
    {
        $user = User::find($id);
        $following = $user->following()->get();

        return view('following',compact('user','following'));
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->get();

        return view('followers',compact('user','followers'));
    }
}
