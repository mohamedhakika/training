@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body justify-content-center d-flex mh-100" style="min-height: 500px;">
                    <div class="justify-content-center align-self-center d-flex">
                        <h3 class="justify-content-center align-self-center d-flex"> Welcome {{Auth::user()->name ?? 'Supper User'}}! <br> Design your dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>
@endsection
