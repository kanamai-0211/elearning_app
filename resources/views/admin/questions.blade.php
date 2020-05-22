@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
    <h1>Admin|Question</h1>
        <a href="{{ route('questions.create',['id'=>$category->id]) }}" class="btn btn-primary">add question</a>
    </div>
    <div class="col-md-10 mx-auto">
        <div class="card">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th class="text-danger">Answer</th>
                        <th>choice1</th>
                        <th>choice2</th>
                        <th>choice3</th>
                        <th>choice4</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($category->questions as $question)
                    <tr>
                        <th>{{$question->question}}</th>
                        <td class="text-danger">{{ $question->choices()->where("is_correct",1)->first()->choice}}</td>
                        @foreach($question->choices as $choice)
                        <td>{{$choice->choice}}</td>
                        @endforeach
                        <td class="d-flex">
                            <a href="#" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('questions.delete',['id'=>$question->id ]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                       
                    </tr>
                @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection