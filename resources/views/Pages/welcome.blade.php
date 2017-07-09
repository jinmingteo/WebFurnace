@extends('main')

@section('title',' | Home')
@section('content')

       <style>
    section .designer {
        color: maroon;
        margin-bottom: 10rem;
        font-size: 40px;

    }
    section .user {
        color: teal ;
        margin-bottom: 10rem;
        font-size: 40px;
    }
    section .top {
        font-weight: 500;
    }
    section .text {
        font-size:16px;
    }
    .jumbotron h1 {
        color: #ffffff;
        font: arial;
    }
    .jumbotron {
        background-color: black;
        background-size:cover;
    }
    .btn.btn-primary {
        border-radius: 2px;
        color: #ffffff;
        text-shadow: none;
        background-color: maroon;
    }
    .btn.btn-primary:hover {
        color: maroon;
        background-color: #ffffff;
    }
    .btn.btn-secondary {
        border-radius: 2px;
        color: #ffffff;
        text-shadow: none;
        background-color: teal;
    }
    .btn.btn-secondary:hover {
        color: teal;
        background-color: #ffffff;
    }
    </style>

    <body>
    <header class="row">
        <div class="row text-center">
            <div class="jumbotron">
                <h1> Welcome to WebFurnace</h1>
                <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Getting Started</a></p> -->
            </div>
        </div>
    </header> 
      <!-- end of header .row -->
      <section class = "container">
        <div class = "col-md-5 col-md-offset-1">
            <div class ="designer">
                <div class = "top">
                    <h2>I am a Web Designer</h2>
                </div>
                <div class = "text">
                    <p>Share your great designs with those who need them!</p>
                    <a href='#' class="btn btn-primary"> Sign Up Now! </a>
                </div>
            </div>
        </div>
        <div class = "col-md-5 col-md-offset-1">
            <div class = "user">
                <div class = "top"> 
                    <h2>I am an Employer/User</h2>
                </div>
                <div class = "text">
                    <p>Look for your desired designer that satisfies your need!</p>
                    <a href='#' class="btn btn-secondary"> Sign Up Now! </a>
                </div>
            </div>
        </div>
    </section>
    </body>

      <div class="row">
        <div class="col-md-8">

          @foreach($posts as $post)
            <div class="post">
              <h3>{{ $post -> title }}</h3>
              <p>{{substr($post -> body, 0,300)}}{{ strlen($post -> body) > 300 ? "..." : ""}}</p>
              <a href=" {{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
            </div>
            <hr>
          @endforeach
        </div>


        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>
        
@endsection