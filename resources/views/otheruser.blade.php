@extends('layouts.master')

@section('content')
<!--{{Auth::user()->id}}-->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-content p-4 profile-header">
                    <img class="img-fluid img-thumbnail p-3 " src="{{asset('images/demoperson.png')}}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ $user->name }}</h4>
                        <div class="form-group text-center">
                            @if(auth()->user()->is_following($user->id) == true)
                            <a href="{{ route('users.unfollow',['id' => $user->id]) }}"
                                class=" btn btn-danger">Unfollow</a>
                            @else
                            <a href="{{ route('users.follow',['id' => $user->id])}}" 
                                class=" btn btn-primary">Follow</a>
                        </div>
                        @endif
                    </div>
                    <hr class="my-2">
                    <div class="row text-center">
                        <div class="col-md-6 p-2">
                            <h5><a href="{{ route('users.followers',['id' => $user->id ]) }}">{{ $user->followers()->count() }}</a></h5>
                            <h6 class="text-muted">Followers</h6>
                        </div>
                        <div class="col-md-6 p-2">
                            <h5><a href="{{ route('users.following',['id' => $user->id])}}">{{ $user->following()->count() }}</a></h5>
                            <h6 class="text-muted">Following</h6>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="jumbotron">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="jumbotron w-100">
            {{--   <h4 class="text-center">Blog </h4>
                @foreach ($posts->sortByDesc('created_at') as $post)
                <div class="card my-4">
                    <div class="card-header">
                        <div class="float-right d-flex">
                            <a href="{{ route('blog.edit',['id'=>$post->id]) }}" class="btn btn-primary mr-2">Edit</a>
            <form action="{{ route('blog.destroy',['id' =>$post->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="sibmit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        {{ $post->content }}
    </div>
</div>
@endforeach --}}
</div>
</div>
</div>
</div>
@endsection
