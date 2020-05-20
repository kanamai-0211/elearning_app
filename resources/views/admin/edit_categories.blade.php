@extends('layouts.master')

@section('content')

<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header">
            edit category
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update',['id'=> $category->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
