@extends('main')

@section('title', '| Profile')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> {!!$user -> name!!}</h1>
            
        </div>
    </div>
@endsection
