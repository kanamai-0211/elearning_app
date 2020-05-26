@extends('layouts.master')

@section('content')
<div class="conteiner conteiner-small">
    <h2>Categories</h2>
    <div class="row object-list">
    @foreach($categories as $category )
        
        <div class="col-sm-5 m-2 mx-auto">
        <div class="card">
            <section class="col-sm-12">
                <div class="detail">
                    <h2>{{$category->title}}</h2>
                    <p>{{$category->description}}</p>
                    
                    <div class=" text-right">
                    <form action="{{ route('user.lessons') }}" method="post">
                    @csrf
                        <input type="hidden" name="lesson_user_id" value="{{ $user->id }}">
                        <input type="hidden" name="lesson_category_id" value="{{$category->id}}">

                       <input type="submit" name="create_lesson" class="btn btn-default" value="go to lesson">
                    </form> 
                    </div>
                </div>
            </section>
        </div>
        </div>
    @endforeach
    </div>

</div>

@endsection