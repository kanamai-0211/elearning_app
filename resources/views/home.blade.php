@extends('layouts.master')

@section('content')
<!--{{Auth::user()->id}}-->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-content p-4">
                    <div class="text-center">
                        <img class="img-fluid img-thumbnail p-3 " src="{{asset('images/demoperson.png')}}"
                            alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ Auth::user()->name }}</h4>
                        <div class="form-group text-center">
                            <a name="edit" href="{{ route('profile.edit',['id' => Auth::user()->id ]) }}" class="btn btn-primary mt-3">Edit Profile</a>
                        </div>
                        <hr class="my-2">
                        <div class="row text-center">
                            <div class="col-md-6 p-2">
                                <h5><a href="{{ route('users.followers',['id' => Auth::user()->id ]) }}">{{ Auth::user()->followers()->count() }}</a></h5>
                                <h6 class="text-muted">Followers</h6>
                            </div>
                            <div class="col-md-6 p-2">
                                <h5><a href="{{ route('users.following',['id' => Auth::user()->id])}}">{{ Auth::user()->following()->count() }}</a></h5>
                                <h6 class="text-muted">Following</h6>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="text-center">
                            <h5>{{Auth::user()->lessons->where('completed',1)->groupBy('category_id')->count()}}</h5>
                            <h6 class="text-muted">learned categories</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
                
                <div class="card my-4">
                    <div class="card-header">
                        <h4 class="text-center">Activities</h4>
                    </div>
                    
                    @foreach($activities->sortByDesc('created_at') as $activity)
                    <div class="card-body">
                        @if($activity->relationship)
                        
                            <a href="{{ route('users.show',['id' =>  $activity->user->id]) }}">{{ $activity->user->name  }}</a>
                            followed
                            <a href="{{ route('users.show',['id' => $activity->relationship->follow_user->id])}}">{{ \App\User::find($activity->relationship->followed_id)->name}}</a>
                            <footer class="blockquote-footer">{{$activity->relationship->updated_at->diffForHumans()}}</footer>
                        @elseif($activity->lesson)
                            <a href="{{ route('users.show',['id' =>  $activity->user->id]) }}">{{ $activity->user->name  }}</a>
                            learned
                            <a href="{{ route('user.categories',['id' =>  $activity->user->id]) }}">{{ $activity->lesson->category->title}}</a>
                            <footer class="blockquote-footer">{{$activity->lesson->updated_at->diffForHumans()}}</footer>
                        @endif
                        
                    </div>
                    @endforeach 
                </div>
                
        </div>
    </div>
</div>
@endsection
