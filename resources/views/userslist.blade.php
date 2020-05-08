@extends('master')

@section('content')
<div class="row">
    <div class="container">
        <h1 class="text-center">All Mebers</h1>
        <ul class="list-group col-md-6 mx-auto">
            @foreach($users as $user)
                @if($user != auth()->user())
                <li class="list-group-item list mb-2">{{$user->name}}</li>
                @endif
            @endforeach
         </ul>
    </div>
</div>
@endsection