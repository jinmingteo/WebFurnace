@extends('main')

@section('title', '| Edit Profile')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/styles.css')!!}

@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				<h1>Edit your profile </h1>
				<hr>
				{!! Form::model($profile, ['route' => ['designerprofile.update', $user->username], 'method' =>'PUT', 'files' => true]) !!}

				{{ Form::label('About Me', 'Bio:')}}
				{{ Form::textarea('aboutme', null,['class' => 'form-control']) }}
				<br>

				{{ Form::label('featured_image', 'Upload Featured Image:') }}
				{{ Form::file('featured_image') }}
				<hr>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block'])}}
					</div>
					<div class="col-md-6">
						{!! Html::linkRoute('designerprofile.show','Cancel',array($user->username),array('class' =>'btn btn-danger btn-block'))!!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
@endsection