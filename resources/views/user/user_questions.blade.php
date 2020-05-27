@extends('layouts.master')

@section('content')
<div class="col-md-10 mx-auto">
    <h2 class="text-center">{{$category->title}}</h2>
    <h2 class="text-right">{{ $questions->currentPage() }} of {{ $questions->lastPage() }}</h2>
    <div class="card">
    @foreach($questions as $question)
        
            <div class="form-container">
                <div class="text-center">
                
                    <h2>{{$question->question}}</h2>
                    @foreach($question->choices as $choice)
                    <form class="button" action="{{ route('user.answers.new',['id' => $lesson->id]) }}" method="POST">
                    @csrf
                        <input class="btn btn-primary" type="hidden" name="choice_id" value="{{$choice->id}}">
                        <input class="btn btn-primary" type="hidden" name="lesson_id" value="{{$lesson->id}}">
                        @if ($questions->currentPage() == $questions->lastPage())
                            <input class="btn btn-primary" type="hidden" name="nextpageurl" value="/lessons/{{ $lesson->id }}">
                        @else
                            <input class="btn btn-primary" type="hidden" name="nextpageurl" value="{{ $questions->nextPageUrl() }}">
                        @endif
                        <input class="btn btn-primary m-2 col-md-6" type="submit" name="choice" value="{{$choice->choice}}">
                    </form>
                    
                    @endforeach 
                </div>
            </div>
       
       @endforeach
    </div>
</div>

@endsection
