@extends('main')

@section('stylesheets')
	
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/styles.css')!!}

@endsection

@section('content')

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>{{$user -> username}}</h2>
                    <p><strong>About: </strong> {{$design-> aboutme}}</p>
                    
                    <p><strong>Email: {{$user -> email}}</strong>
                    </p>
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
</div>
@endsection