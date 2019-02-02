<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Interuniversity Gliding Competition 2018</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            body {
                height: 100%;
                background-image: url(img/front_cover_image.png);
                background-size:100% 100%;
                -o-background-size: 100% 100%;
                -webkit-background-size: 100% 100%;
                background-size: 50%;
                background-repeat: no-repeat;
                background-position: center;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
				color: #000000;
				font-weight: bold;
                font-size: 3.7em;
            }

            .subtitle {
				color: #000000;
				font-weight: bold;
                font-size: 2.2em;
            }
            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 0.85em;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			@media screen and (max-width: 1000px) {
			   body {
					background-size: 80%;
			   }
			   
			@media screen and (max-width: 400px) {
			   body {
					background-size: 120%;
			   }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="subtitle m-b-md">
                    28/07/2018 - 05/08/2018
                </div>
                <div class="title m-b-md">
                    Interuniversity Gliding Competition
                </div>

                <div class="links">
                    <a href="{{ route('welcome') }}">Introduction</a>
					<a href="{{ route('ladder') }}">Ladder</a>
					{{--<a href="{{ route('entries') }}">Entries</a>--}}
                    <a href="{{ route('rules') }}">Competitions</a>
                    {{--<a href="{{ route('shirts') }}">Shirts</a>--}}					
					<a href="{{ route('gallery') }}">Images</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </body>
</html>
