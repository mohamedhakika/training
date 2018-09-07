@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit post</h5>
                    
                    <hr class="pb-2">
                    <form method="post" action="{{route('posts.update', $post->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control{{ $errors->has('tittle') ? ' is-invalid' : '' }}" value="{{$post->tittle ?? old('tittle') }}" name="tittle" placeholder="Post title">

                             @if ($errors->has('tittle'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tittle') }}</strong>
                                </span>
                             @endif
                        </div>

                        <div class="form-group">
                            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="3" placeholder="Post body">{{ $post->description ?? old('description') }}</textarea>

                             @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">
                            {{ __('Update') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
