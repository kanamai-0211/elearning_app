<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Choice;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminqaController extends Controller
{
    public function index($id)
    {
       
        $category = Category::find($id);
        $questions = $category->questions;
        
        return view('admin/questions', compact('category'));
    }

    public function create($id)
    {
        $category = Category::findOrFail($id);
        return view('admin/create_questions',compact('category'));
    }

    public function store(Request $request, $id)
    {
        
       /* dd($request);
       $this->validate($request,[
            'question'=> 'required|min:3|max:50',
            'choice1' => 'required|min:1|max:150',
            'choice2' => 'required|min:1|max:150',
            'choice3' => 'required|min:1|max:150'
        ]);*/

        $question = Question::create([
           'question'=> $request->question,
           'category_id' =>$request->id
       ]) ;

        $choice1 = Choice::create([
            'choice'=> $request->choice1,
            'question_id' =>$question->id,
        ]);


        $choice2 = Choice::create([
            'choice'=> $request->choice2,
            'question_id' =>$question->id,
        ]);


        $choice3 = Choice::create([
            'choice'=> $request->choice3,
            'question_id' =>$question->id,
        ]);


        $choice4 = Choice::create([
            'choice'=> $request->choice4,
            'question_id' =>$question->id,
        ]);
      
       if($request->check == "check1"){
           $choice1->is_correct = 1;
           $choice1->save();
       }

      
       if($request->check == "check2"){
        $choice2->is_correct = 1;
        $choice2->save();
       }

      
       if($request->check == "check3"){
        $choice3->is_correct = 1;
        $choice3->save();
       }

      
       if($request->check == "check4"){
        $choice4->is_correct = 1;
        $choice4->save();
       }
        
       return redirect()->route('admin.questions', ['id' => $id]);
    }
}
