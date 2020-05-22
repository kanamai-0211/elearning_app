@extends('layouts.master')

@section('content')
<div class="row col-md-10 mx-auto mt-5">
<div class="card">
    <div class="card-header">
        create category 
    </div>
    <div class="card-body">
        @if(count($errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="alert alert-danger list-unstyled">{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" required>
        </div>
        <div class="d-flex justify-content-end">
            <a name="back" id="back" class="btn btn-primary mr-2" href="#">Back</a>
            <button type="submit" name="create" class="btn btn-primary">Create Category</button>
        </div>
        </form>
    </div>
</div>
   
</div>

@endsection