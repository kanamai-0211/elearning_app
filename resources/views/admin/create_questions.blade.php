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

                    <form action="{{ route('questions.store' ,['id'=> $category->id]) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" name="question" id="question" required>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <label for="choice1">choice1:</label>
                                <input type="text" class="form-control" name="choice1" id="choice1" name="choice1" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check" id="check1" value="check1">
                                    <label class="form-check-label"  for="check1">correct</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice2">choice2:</label>
                                <input type="text" class="form-control" name="choice2" id="choice2" name="choice2" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check" id="check2" value="check2">
                                    <label class="form-check-label"  for="check2">correct</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice3">choice3:</label>
                                <input type="text" class="form-control" name="choice3" id="choice3" name="choice3" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check" id="check3" value="check3">
                                    <label class="form-check-label"  for="check3">correct</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice4">choice4:</label>
                                <input type="text" class="form-control" name="choice4" id="choice4" name="choice4" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check" id="check4" value="check4">
                                    <label class="form-check-label"  for="check4">correct</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a name="back" id="back" class="btn btn-secondary mr-2"
                                    href="{{ route('admin.questions',['id'=>$category->id]) }}">Back</a>
                                <button type="submit" name="create" class="btn btn-primary">Create Question</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
