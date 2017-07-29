<!-- default bootstrap navbar-->
     <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/")>WebFurnace</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            @if (Auth::check())
              <li class="{{Request::is('/') ? "active" : "" }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
              <li class="{{Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
              <li class="{{Request::is('blog') ? "active" : "" }}"><a href="/blog">Designs</a></li>  
              <li class="{{Request::is('posts') ? "active" : "" }}"><a href="/posts">Jobs</a></li>
              <li class="{{Request::is('posts/create') ? "active" : "" }}"><a href="/posts/create">Post A Job</a></li>
              <li class="{{Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
          
            @else
              <li class="{{Request::is('/') ? "active" : "" }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
              <li class="{{Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
              <li class="{{Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
            @endif
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())


              <li class="dropdown">

                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {{Auth::user()-> username}} <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li><a href="{{ route('posts.index')}}">Posts</a></li>
                    <li><a href="{{ route('categories.index')}}">Categories</a></li>
                    <li role="separator" class="divider"></li>
                    @if (Auth::guard('web')->check())
                      <li><a href="{{ route('logout') }}">Logout</a></li>
                    @else
                      <li><a href="{{ route('consumer.logout') }}">Logout</a></li>
                    @endif
                  </ul>
                </li>
            @else

              <a href="{{ route('loginas') }}" class="btn btn-default" style="margin-top: 8px"> Login </a>

            @endif

          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>