@extends('main')

@section('title', '| Homepage')

@section('content')
        <header class="row">
        <div class="row text-center">
            <img src="{{ asset('images/welcome.PNG') }}"/>
                <!--<h1> Welcome to WebFurnace</h1>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Getting Started</a></p> -->
        </div>
        </header> 

        <h1> Recent Job Posts </h1>

       <div class="well">
    
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col-md-8">
                        <h3>{{ $post->title }}</h3>
                        <label>Category: {{ $post->category->name }}</label>
                        <p>{{substr(strip_tags($post->body),0,50)}}{{strlen(strip_tags($post->body)) > 50 ? "..." : ""}}</p>
                        <label>Posted by: <a href="">{{ $post->poster }}</a></label>
                        <p><label>Created At: {{date('M j, Y h:ia', strtotime($post->created_at))}}</label></p>
                    </div>
                    <div class="col-md-4">
                        <div class="well">
                            <dl class="dl horizontal">
                                <label>Remuneration:</label><p>{{ $post->budget}}</p>
                            </dl>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View More and Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        
    </div>

@endsection