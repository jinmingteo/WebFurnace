@extends('main')

@section('title', ' | Edit Blog Post')

@section('content')

	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' =>'PUT', 'files' => true]) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:')}}
			{{ Form::text('title', null, ["class" =>'form-control input-lg'])}}

			{{ Form::label('slug', 'Slug:', ['class' =>'form-spacing-top'])}}
			{{ Form::text('slug', null, ['class' => 'form-control'])}}

			{{Form::label('category_id', 'Category:', ['class' =>'form-spacing-top'])}}
			{{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
			
			{{Form::label('featured_image', 'Update Image:',['class' =>'form-spacing-top'])}}
			{{Form::file('featured_image')}}
			
			{{ Form::label('body', 'Body:', ['class' =>'form-spacing-top'])}}
			{{Form::textarea('body',null, ['class' => 'form-control'])}}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y H:i',strtotime($post-> created_at))}} </dd>
				</dl>

				<d1 class="d1-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{date('M j, Y H:i',strtotime($post-> updated_at))}}</dd>
				</d1>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show','Cancel',array($post -> id),array('class' =>'btn btn-danger btn-block'))!!}
				
					</div>
					<div class="col-sm-6">
						{{Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close()!!}
	</div> <!--end of form -->

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
@endsection