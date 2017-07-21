@extends ('main')
@section('title',' | Log In As')
@section('content')

  <div class="row">
  	<div class="jumbotron">
        <h1 class="text-center">Logging in as a...</h1>
 	  </div>
        <div class="col-md-3 col-md-offset-3">
        	<h1>Designer</h1>
        	<a href="{{ route('login') }}" class="a btn btn-primary">Click Here</a>
        </div>
        <div class="col-md-5 col-md-offset-1">
        	<h1>Employer/User</h1>
        	<a href="{{ route('consumer.login') }}" class="b btn btn-primary" style="margin-bottom: 100px">Click Here</a>
        </div>
    <div class="row">
        <div class="text-center">
          <h4>Psst! Not a Member Yet??</h4>
          <p>Sign Up as a... </p>
          <p><a href="{{ route('register') }}">Web Designer</a> || <a href="{{ route('register.consumer') }}">Employer/User</a></p>
        </div>
    </div>
  </div>
@endsection