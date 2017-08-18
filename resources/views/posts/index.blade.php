@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		@if (Auth::guard('consumers')->check())
		<div class="col-md-2">
			<a href="{{ route('posts.create')}}" class= "btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
		</div>
		@endif
		<div class="col-md-12">
			<hr>
		</div> 
	</div> <!-- end of row -->
		
	<div class="well">
	
			@foreach ($posts as $post)
				<div class="row">
					<div class="col-md-8">
						<h3>{{ $post->title }}</h3>
						<label>Category: {{ $post->category->name }}</label>
						<p>{{substr(strip_tags($post->body),0,50)}}{{strlen(strip_tags($post->body)) > 50 ? "..." : ""}}</p>
						<label>Posted by: <a href="{{ route('consumerprofile.show', $post->poster) }}">{{ $post->poster }}</a></label>
						<p><label>Created At: {{date('M j, Y h:ia', strtotime($post->created_at))}}</label></p>
					</div>
					<div class="col-md-4">
						<div class="well">
							<dl class="dl horizontal">
								<label>Remuneration:</label><p>{{ $post->budget}}</p>
							</dl>

							<div class="row">
								<div class="col-md-6">
									<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
			@endforeach
		<div class="text-center">
			{!! $posts->links() !!}
		</div>
	</div>



		<!--
		<div class="row">
			<div class ="col-md-12">
				<table class = "table">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body </th>
						<th>Created At </th>
						<th></th>
					</thead>

					<tbody>
						@foreach($posts as $post)

							<tr>
								<th> {{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{substr(strip_tags($post->body),0,50)}}{{strlen(strip_tags($post->body)) > 50 ? "...": ""}} </td>
								<td>{{ date('M j, Y',strtotime($post-> created_at))}}
								<td><a href={{route('posts.show', $post->id)}} class="btn btn-default btn-sm">View</a>
								<a href="{{route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
								</td>
							</tr>

						@endforeach
					</tbody>
				</table>

				<div class="text-center">
				{!! $posts->links();!!}
				</div>
			</div>
		</div> 

	</div> -->


@endsection