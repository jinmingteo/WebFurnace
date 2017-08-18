@extends('main')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/styles.css')!!}

@endsection

@section('content')

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<div class="well">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="row">
                <div class="col-md-11">
                    @if (empty($design->image))
                    <figure><img src="{{asset('images/profile.jpg')}}" class="profile-image"/></figure>
                    @else
                    <figure><img src="{{asset('images/'.$design->image)}}" class="profile-image"/></figure>
                    @endif
                    <div class="profile-name">
                        <h1>{{$user -> username}}</h1> 
                    </div>
                </div>
                @if (Auth::user()->username == $user->username)
                <div class="col-md-1" style="margin-left:10px">
                    <a href="{{ route('designerprofile.edit', $user->username) }}" class="btn btn-primary" style="margin-top: 25px">Edit Profile</a>
                </div>
                @endif
            </div>
            <br>
            <h5><strong>About: </strong> {{$design-> aboutme}}</h5>    
            <h5><strong>Email: </strong>  {{$user -> email}}</h5>
            <br>
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <p><small>Created At:</small></p>
                    <h2><strong>{{ date('M j, Y ',strtotime($user-> created_at))}}  </strong></h2>                    
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <p><small>Job Request On Hand</small></p>
                    <h2><strong>0</strong></h2>                    
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <p><small>Completed Job Request</small></p>
                    <h2><strong>0</strong></h2>                    
                </div>
            </div>
        </div>
    </div> 
</div><!--<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>{{$user -> username}}</h2> 
                    <p><strong>About: </strong> {{$design-> aboutme}}</p>
                    <div class="row">
                        <div class="col-md-11">
                            <p><strong>Email: {{$user -> email}}</strong> 
                            </p>
                        </div>
                        @if (Auth::user()->username == $user->username)
                        <div class="col-md-1">
                            <a href="{{ route('designerprofile.edit', $user->username) }}" class="btn btn-primary" style="margin-bottom: 5px">Update Profile</a>
                        </div>
                        @endif
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="{{asset('images/'.$design->image)}}"/>
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <p><small>Created At:</small></p>
                    <h2><strong>{{ date('M j, Y ',strtotime($user-> created_at))}}  </strong></h2>                    
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <p><small>Job Request On Hand</small></p>
                    <h2><strong>0</strong></h2>                    
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <p><small>Completed Job Request</small></p>
                    <h2><strong>0</strong></h2>                    
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>-->
@endsection