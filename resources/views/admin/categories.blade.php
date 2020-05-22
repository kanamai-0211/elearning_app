@extends('layouts.master')

@section('content')

<div class="row">
@if(auth()->user()->is_admin == 1)
    <div class="col-md-8 mx-auto">
    <h1>Admin|Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">add category</a>
    </div>
    <div class="col-md-8 mx-auto">
        <div class="card">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{ route('categories.edit',['id'=>$category->id]) }}">Edit</a>
                            <form action="{{ route('categories.destroy',['id'=>$question->id]) }}" method="POST">
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
 @else
 <div class="col-md-5 mx-auto">
    <h1 class="text-danger">YOU CAN NOT ACSESS</h1>   
 </div>
@endif
</div>

@endsection