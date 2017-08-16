@extends('main')

@section('title', ' | Update Profile')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				<h1>Update your profile </h1>
				<hr>
				{!! Form::open(['route' => 'consumerprofile.store', 'method' => 'POST','data-parsley-validate' => '', 'files' => true]) !!}
				
				
				{{ Form::label('About Me', 'Bio:')}}
				{{ Form::textarea('aboutme', null,['class' => 'form-control']) }}
				<br>

				{{ Form::label('featured_image', 'Upload Featured Image:') }}
				{{ Form::file('featured_image') }}
				<br>

				{{Form::submit('Update profile', ['class' => 'btn btn-primary btn-block'])}}

				{!! Form::close() !!}
			</div>
		</div> 
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
@endsection