@extends('main')

@section('title', ' | Create New Post')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}
	

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Job Request </h1>
			<hr>
			{!! Form::open(['route' => 'posts.store','data-parsley-validate' => '', 'files' => true]) !!}
			
				{{ Form::label('title','Job/Project Title:')}}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength'=>'255'))}}
				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength'=> '255')) }}

				{{ Form::label('category_id', 'Job/Project Category:') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ Form::label('othercategory', 'If Others, please specify:') }}
				{{ Form::text('othercategory', null, ['class' => 'form-control']) }}

				{{ Form:: label('body',"Details, Requirement, Information:") }}
				{{ Form::textarea('body','Anything the designer needs to know', array('class' => 'form-control')) }}

				{{ Form::label('deadline_id', 'Deadline: (Let the designer have a rouge gauge of the time available)') }}
				<select class="form-control" name="deadline_id">
					@foreach($deadlines as $deadline)
						<option value="{{ $deadline->id }}">{{ $deadline->name }}</option>
					@endforeach
				</select>

				{{ Form::label('budget', 'Budget:') }}
				{{ Form::text('budget', null, ['class' =>'form-control']) }}


				{{ Form::label('featured_image', 'Upload Featured Image:') }}
				{{ Form::file('featured_image') }}

				{{ Form::submit('Create Job Post', array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top:20px;'))}}

			{!! Form::close() !!}


		</div>
	</div>

@endsection

@section('scripts')
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector:'textarea',
			plugins: 'link',
			menubar: false
		});
	</script>
	{!! Html::script('js/parsley.min.js')!!}
@endsection