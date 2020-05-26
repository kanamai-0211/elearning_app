@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    create question
                </div>
                <div class="card-body">
                    @if(count($errors)>0)
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                        <li class="alert alert-danger list-unstyled">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form action="{{ route('questions.update' ,['id'=> $question->id]) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" name="question" id="question" value="{{$question->question}}" required>
                        </div>
                        <div class="col-md-10">
                        @foreach($question->choices as $key => $choice)
                        
                            <div class="form-group row">
                                <label for="choice1">choice:</label>
                                <input type="text" class="form-control" name="choice[{{$key}}]" value="{{$choice->choice}}" required>
                                <div class="form-check">
                               
                               @if($choice->is_correct == 1 )
                                    <input class="form-check-input" type="radio" name="check"  value="{{$key}}"　checked>
                                    <label class="form-check-label"  >correct</label>
                                @else
                                    <input class="form-check-input" type="radio" name="check" value="{{$key}}">
                                    <label class="form-check-label"  >correct</label>
                                @endif
                                </div>
                            </div>
                        @endforeach

                            <div class="d-flex justify-content-end">
                                <button type="submit" name="update" class="btn btn-primary">Update Question</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
