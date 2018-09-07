@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">  
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success potea" role="alert">
                    <p class="mb-0">{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create post <span class="float-right"><a class="btn btn-outline-secondary btn-sm" href="{{ route('posts.index') }}">{{ __('Posts List') }}</a></span></h5>
                      <hr class="py-3">  
                    <form method="post" action="{{route('posts.store')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control{{ $errors->has('tittle') ? ' is-invalid' : '' }}" value="{{ old('tittle') }}" name="tittle" placeholder="Post title">

                             @if ($errors->has('tittle'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tittle') }}</strong>
                                </span>
                             @endif
                        </div>

                        <div class="form-group">
                            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="3" placeholder="Post body">{{ old('description') }}</textarea>

                             @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">
                            {{ __('Submit') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(function() {
        setTimeout(function() {
            $(".potea").slideUp("slow");
        }, 5000);
    });
</script>
@endsection