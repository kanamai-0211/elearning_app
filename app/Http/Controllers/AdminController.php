<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin/categories', compact('categories'));
    }

    public function create()
    {
        return view('admin/create_categories');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|min:3|max:50',
            'description' => 'required|min:3|max:150'
        ]);

       Category::create([
           'title'=> $request->title,
           'description'=> $request->description
       ]) ;

       return redirect()->route('admin.categories');
    }
}
