<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Cream.app</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/coming-sssoon.css') }}" rel="stylesheet"/>

    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

</head>

<body>
    <nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ env('APP_NAME') }}
                        </a>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/home') }}">Home</a>
                    </li>

                    @else
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>

                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    <div class="main" style="background-image: url('images/tm-main.jpg')">
       <div class="container">

           <div class="cover black" data-color="black"></div>

           <h1 class="logo">
                {{ env('APP_NAME') }}
            </h1>
            <!--  H1 can have 2 designs: "logo" and "logo cursive"           -->

            <div class="content">
                <h4 class="motto">Menaxhimi i detyrave ditore më shpejt se kurrë.</h4>
            </div>
        </div>
    </div>
</body>
    <script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
</html>
