@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{!! $post->title !!}</h1>
			<small>posted by: <a href="{{ route('consumerprofile.show', $post->poster) }}">{{ $post->poster }}</a></small>
			<br>
			<br>
			@if (empty($post->image))
			@else
			<img src="{{asset('images/'.$post->image)}}" class="post-image" alt ="This is a photo"/>
			@endif
			<h5 class="lead">{!! $post -> body !!}</h5>
			<h4>Remuneration: {{ $post->budget }}</h4>
			<hr>

			<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-8">
						<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>   {{ $post->comments()->count() }} Comments</h3> 
					</div>
				</div>
			
				@foreach($post->comments as $comment)
					<div class="comment">
						<div class="author-info">
							<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) }}" class="author-image">
								
								<div class="author-name">
									<h4>{{$comment->username }}</h4>
									<p class="author-time">{{ date('M j, Y h:ia'), strtotime($comment->created_at) }}</p>
								</div>
								<div class="buttons">
									@if (Auth::user()->username == $comment->username)
										<a href="{{route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
										<a href="{{route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									@endif
								</div>

						</div>
						<div class="comment-content">
							{{$comment->comment}}
						</div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="row">
			<div id="comment-form" class="col-md-8">
				<h3>Add a Comment</h3>
				{{ Form::open(['route'=> ['comments.store', $post->id], 'method'=> 'POST']) }}
					<div class="row">
						<!--<div class="col-md-6">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('email', 'Email:') }}
							{{ Form::text('email', null, ['class' => 'form-control']) }}
						</div> -->
						<div class="col-md-12">
							{{ Form::label('comment', 'Comment:')}}
							{{ Form::textarea('comment', null, ['class'=>'form-control','rows'=>'5']) }}

							{{ Form::submit('Add Comment', ['class'=> 'btn btn-success btn-block', 'style'=>'margin-top:15px']) }}
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
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
						<div class="col-md-12">
							{{Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing'])}}
						</div>
					</div>
					
				@endif
			</div>
		</div>
	</div>

@endsection