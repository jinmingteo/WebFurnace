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

        <div class="row">
            <div class="col-md-8">
                
                @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>
        </div>

@endsection