@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header"><span class="float-right">Comments {{ $post->comments->count() }}</span></div>

                    <div class="card-body">
                        <h5 class="card-title">{{$post->tittle}}</h5>

                         <p class="card-text">{{ $post->description }}</p>
                        
                         <p class="card-text"><small class="text-muted">Created by {{$post->user->name}} {{$post->created_at->diffForHumans() ?? 'null'}} </small></p>

                        <ul class="list-group">
                            @foreach($post->comments as $comment)
                                <li class="list-group-item">{{$comment->body}} <span class="float-right"><small>By {{ $comment->user->name }}</small></span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User roles</h5>

                    <p class="card-text">{{ $user->name }} </p>
                    <ul class="list-group">
                        @foreach($user->roles as $role)
                            <li class="list-group-item">{{$role->display_name}} <span class="float-right"><small>{{ $role->pivot->created_at }}</small></span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
