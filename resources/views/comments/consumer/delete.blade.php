@extends('main')

@section('title','| Delete Comment')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Delete this Comment?</h1>
		<p>
			<strong>Name:</strong> {{$comment->name}} <br>
			<strong>Email:</strong> {{$comment->email}} <br>
			<strong>Comment:</strong> {{$comment->comment}}
		</p>
		{{ Form::open(['route' => ['comments.destroy', $comment->id] ,'method' =>'DELETE']) }}
			{{ Form::submit('Yes Delete This Comment',['class'=> 'btn btn-lg btn-block btn-danger'])}}

		{{ Form::close() }} 
	</div>
</div>

@endsection