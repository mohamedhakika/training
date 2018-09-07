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
                    <h4 class="card-title">{{$post->tittle}}</h4>

                    <hr>

                        <p class="card-text text-muted">{{ $post->description }}</p>
                    
                        <p class="card-text"><small class="text-muted">Created by {{$post->user->name}} {{$post->created_at->diffForHumans() ?? 'null'}} </small></p>

                    
                        <div class="btn-group btn-group-sm">
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-success">Edit</a>
                        <button data-toggle="modal" data-postid="{{$post->id}}" data-target="#deletemodal" class="btn btn-outline-danger">Delete</button>
                        </div>
                    
                    <hr>
                    <p class="card-title">Comments ({{$post->comments->count()}})</p>
                    <ul class="list-group">
                        @foreach($post->comments as $comment)
                            <li class="list-group-item">{{$comment->body}} <span class="float-right"><small>By {{ $comment->user->name }}</small></span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalCenterTitle">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" action="{{route('posts.destroy', 'id')}}">
      <div class="modal-body">
        <p class="lead">Are you sure you want to delete this post?</p>
        <input type="hidden" name="post_id" id="post_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    $('#deletemodal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var post_id = button.data('postid')
        var modal = $(this)
        modal.find('.modal-body #post_id').val(post_id)
    });

    $(function() {
        setTimeout(function() {
            $(".potea").slideUp("slow");
        }, 5000);
    });
</script>
@endsection
