@extends('main')

@section('title', '| All Categories')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}

@endsection

@section('content')

<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'designerprofile.store', 'method' => 'POST','data-parsley-validate' => '', 'files' => true]) !!}
				
				<h2> Update your profile</h2>
				{{ Form::label('About Me', 'Bio:')}}
				{{ Form::text('aboutme', null,['class' => 'form-control']) }}

				{{ Form::label('featured_image', 'Upload Featured Image:') }}
				{{ Form::file('featured_image') }}

				{{Form::submit('Update your profile', ['class' => 'btn btn-primary btn-block'])}}

				{!! Form::close() !!}
			</div>
		</div> 

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
@endsection