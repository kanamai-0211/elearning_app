<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $users = User::all();

        return view('userslist',compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('otheruser',compact('user'));
    }

    public function edit($user)
    {
        $user = auth()->user();

        return view('editprofile',compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect()->route('home',compact('name','email','password'));
    }
}
