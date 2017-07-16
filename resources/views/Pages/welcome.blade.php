@extends('main')

@section('title',' | Home')
@section('content')

    <body>
    <header class="row">
        <div class="row text-center">
            <img src="{{ asset('images/welcome.PNG') }}"/>
                <!--<h1> Welcome to WebFurnace</h1>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Getting Started</a></p> -->
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
                    <a href="{{ route('register') }}" class="a btn btn-primary"> Sign Up Now! </a>
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
                    <a href={{ route('register.consumer') }} class="b btn btn-primary"> Sign Up Now! </a>
                </div>
            </div>
        </div>
    </section>
    </body>

        
@endsection