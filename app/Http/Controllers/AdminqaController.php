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
       
        $category = Category::find($id);//categoryのモデルを呼び出す
        $questions = $category->questions()->get();//呼び出したモデルからリレーションのquestionsを呼び出す
        
        return view('admin/questions', compact('category','questions'));
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
            'choice'=> $request->choice1,//←choice1 (ここはこっちで自由に変えられる)
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

    public function destroy($id)
    {
        $question = Question::find($id);
        $question ->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('admin/edit_questions',compact('question'));
    }

    public function update(Request $request,$id)
    {
        
        
        $question = Question::find($id);
        $choices  = $question->choices()->get();
        $question->update([
            'question' => $request->question,
        ]);

       foreach($choices as $key => $choice)
       {
            $choice->update([
                'choice' => $request->input('choice')[$key],
                'is_correct'=> 0
            ]);
                //[choice1,choice2,choice3,choice4]これでchoices、その中から[]で一つずつ取れる
                //$choices[0] $choices[1]     
            if($request->check == 0){
              $choices[0]->is_correct = 1;
                $choices[0]->save();
           }

            elseif($request->check == 1){
                $choices[1]->is_correct = 1;
                $choices[1]->save();
            }

            elseif($request->check == 2){
               $choices[2]->is_correct = 1;
                $choices[2]->save();
            }

            elseif($request->check == 3){
               $choices[3]->is_correct = 1;
                $choices[3]->save();
            }

            

       }


        return redirect()->route('admin.questions',$question->category_id);
    }
}
