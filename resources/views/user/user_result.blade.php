@extends('layouts.master')

@section('content')
<div class="col-md-10 mx-auto">
<h2 class="text-center">{{$lesson->category->title}}</h2>
    <div class="card">
        <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Your Answer</th>
                        <th>Correct Answer</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <td>{{ $answer->choice->question->question}}</td>
                        <td>{{ $answer->choice->choice }}</td>
                        <td>{{ $answer->choice->question->choices->where("is_correct",1)->first()->choice}}</td>
                
                        @if( $answer->choice->is_correct == 1 )
                        <td>◎</td>
                        @else
                        <td>×</td>
                        @endif 
                    </tr>
                @endforeach
                </tbody>
        </table>
    
    </div>

</div>

@endsection