<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $user = auth()->user();
        $activities = $user->activities()->get();

        return view('home',compact('activities'));
    }

    public function list()
    {
        $users = User::all();

        return view('userslist',compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $activities = $user->activities()->get();

        return view('otheruser',compact('user','activities'));
    }

    public function edit($user)
    {
        $user = auth()->user();

        return view('editprofile',compact('user'));
    }

    public function editprofile_update(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:50|',
            'email'=>'required|min:3|max:50|',
        ]);

        if($request->newpassword != null){
            $request->validate([
                'newpassword'=> ['required', 'string', 'min:6', 'confirmed']
            ]);
            Auth::user()->update([
                'password' => bcrypt($request->newpassword)
                ]);
        
        }    
        
        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('home');
    }
}
