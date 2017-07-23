@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<!-- <img src="{{asset('images/'.$post->image)}}" alt ="This is a photo"/> -->
			<h1>{!! $post->title !!}</h1>
			<small>posted by: <a href="">{{ $post->poster }}</a></small>
			
			<h5 class="lead">{!! $post -> body !!}</h5>
			<h4>Budget: {{ $post->budget }}</h4>
		</div>

		<div class="col-md-4">
			<div class="well">
				 <dl class="dl-horizontal">
					<label>ID No.:</label>
					<p>{{ $post-> id }}</p>
				</dl> 

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{$post->category->name}}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y H:i',strtotime($post-> created_at))}} </p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{date('M j, Y H:i',strtotime($post-> updated_at))}}</p>
				</dl>
				<hr>
				@if (Auth::user()->username == $post->poster) 
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.edit','Edit',array($post -> id),array('class' =>'btn btn-primary btn-block'))!!}
					
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['posts.destroy', $post -> id], 'method' => 'DELETE']) !!}
							 <!--route acccepts an array-->
							
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}
						</div>

						<div class="row">
							<div class="col-md-12">
								{{Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing'])}}
							</div>
						</div>
					</div>
				@else
					<div class="row">
						<div class="col-sm-8">
							<a href="" class="btn btn-primary btn-block">Chat with Employer/User</a>
					
						</div>
						<div class="col-sm-4">
							<a href="" class="btn btn-success btn-block">Apply</a>
						</div>

						<div class="row">
							<div class="col-md-12">
								{{Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing'])}}
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection