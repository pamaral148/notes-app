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
        @yield('addHead')
    </head>

    <body>
        <div class="container">
            <br>
            <div class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">2920 Notes App</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">{{ link_to_route('home', 'Home') }}</li>
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            @if(Auth::check())
                                {{ link_to_route('logout', 'Sign out') }}
                            @else
                                {{ link_to_route('login', 'Sign in') }}
                            @endif
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- ./navigation -->
            <br>
            <h1 class="text-center">2920 Notes App</h1>
            <br>
            <div class="flash">
                @if(isset($message))
                    {{ $message }}
                @endif
                @foreach($errors as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @yield('content')
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

        </div>

    </body>
</html>


