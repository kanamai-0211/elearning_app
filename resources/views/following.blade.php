@extends('layouts.master')

@section('content')
<div class="row">
    <div class="container">
        <h1 class="text-center">{{ $user->name }}'s following</h1>
        <ul class="list-group col-md-6 mx-auto">
            @foreach($following as $user)
                @if($user != auth()->user())
                <li class="list-group-item list mb-2"><a href="{{ route('users.show',['id' => $user->id]) }}">{{$user->name}}</a>
                    <div class="float-right">
                    @if(auth()->user()->is_following($user->id) == true)
                    <a href="{{ route('users.unfollow',['id' => $user->id]) }}" class=" btn btn-danger">Unfollow</a>
                    @else
                    <a href="{{ route('users.follow',['id' => $user->id])}}" class=" btn btn-primary">Follow</a>
                    </div>
                    @endif
                </li>
                @endif
            @endforeach
         </ul>
    </div>
</div>
@endsection