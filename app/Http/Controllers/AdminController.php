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

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin/edit_categories',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->title =request('title');
        $category->description =request('description');
        $category->save();
       /*$category ->update([
            'title'=> $request->title,
            'description'=> $request->description
        ]);*/

        return redirect()->route('admin.categories',compact('title','description'));
    }

    public function destroy($id)
    {
        $category =Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories');
    }
}
