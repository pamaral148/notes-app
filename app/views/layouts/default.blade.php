<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="description" content=" ">
        <meta name="author" content="Paulo Amaral ">
        <link rel="shortcut icon" href="assets/img/favicon.ico">

        <title>{{ $title }}</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="{{ URL::asset('assets/js/html5shiv.js') }}"></script>
          <script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/date_picker.css') }}" rel="stylesheet">
        @yield('addHead')
    </head>

    <body>
        <div class="container">
            <div class="header">
		        <ul class="nav nav-pills pull-right">
		          <li>{{ link_to_route('about', 'About') }}</li>
		          <li><a href="#">Contact</a></li>
          		  @if(Auth::check())
                  <li>{{ link_to_route('logout', 'Log out') }}</li>
                  @else
				  <li>{{ link_to_route('login', 'Sign in') }}</li>
				  <li>{{ link_to_route('register', 'Register') }}</li>	
                  @endif
		          
		          </ul>
		        <h3 class="text-muted">Notes App</h3>
      		</div>
            
            
           
          	<div id="ajaxdiv" >
    			<img src="{{ URL::asset('assets/img/ajax-loader.gif') }}" id="ajax-loader"/>
	 		</div>       
       
            <div class="container messages clearfix">
	            @if (Session::has('message'))
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>{{ Session::get('message')}}</p>
					</div>
			  	@endif
				@if ($errors->has())
					<div class="alert alert-danger alert-dismissable">
					  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul class="list-unstyled">
							@foreach( $errors->all() as $message )
					          <li>{{ $message }}</li>
					        @endforeach
						</ul>
			  		</div>
				@endif
	
				@if (Session::has('error'))
					<div class="alert alert-danger alert-dismissable">
				  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ trans(Session::get('reason')) }}
					</div>
				@elseif (Session::has('success'))
			    		<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    			An e-mail with the password reset has been sent.
			    		</div>
				@endif	
            </div>
           
            @yield('content')
        
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
			 @yield('addEndScript')
        <br class="clearfix"/>
        <div class="footer clearfix">
        	<p>&copy; Web app design and develop by <a href="mailto:pamaral148@gmail.com">P. Amaral</a> and <a href="mailto:me@roberth.ca">Robert H.</a> {{ date("Y")}}</p>
      	</div>
        </div>

    </body>
</html>


