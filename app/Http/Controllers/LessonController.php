<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Answer;
use App\Lesson;
use App\Category;
use App\Question;
use App\Choice;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id)
    {
        $user = User::findOrfail($id);
        $categories = Category::all();

        return view('user/user_categories',compact('user','categories'));
    }

    public function lesson(Request $request)
    {
       
        $lesson = Lesson::create([
            'user_id' => $request->lesson_user_id,
            'category_id'=>$request->lesson_category_id,
        ]);

        return redirect()->route('user.answers', ['id' => $lesson->id, 'category' => $lesson->category_id]);//←修正必要
        
    }

    public function answer($id,$category)
    {
        
        $lesson = Lesson::find($id);
        $category = Category::find($category);
        $questions = $category->questions()->paginate(1);


        return view('user/user_questions',compact('lesson','category','questions'));
    }

    public function create_answer($id, Request $request)
    {
        $lesson = Lesson::find($id);

        $answer = Answer::create([
            'choice_id' => $request->choice_id,
            'lesson_id' => $request->lesson_id
        ]);

        return redirect($request->nextpageurl);
    }

    public function completed($id)
    {
        $lesson = Lesson::find($id);
        $lesson->completed = 1;
        $lesson->save();

        Activity::create([
            'lesson_id' =>$id,
            'user_id' =>$lesson->user_id,
        ]);
        

        return redirect()->route('user.result',['id'=>$id]);
    }

    public function result($id)
    {
        $lesson = Lesson::find($id);
        $answers = $lesson->answers()->get();

        return view('user/user_result',compact('lesson','answers'));
    }
}
