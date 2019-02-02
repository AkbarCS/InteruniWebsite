<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Recaptcha Key -->
    <meta name="recaptcha-key" content="{{ config('services.recaptcha.key') }}">

    <!-- Pusher Key -->
    <meta name="pusher-key" content="{{ config('broadcasting.connections.pusher.key') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Vendor Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span> InteruniGC
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('welcome') }}">Introduction</a></li>
						<li><a href="{{ route('ladder') }}">Ladder</a></li>
                        <li><a href="{{ route('entries') }}">Entries</a></li><li>
                        <li><a href="{{ route('rules') }}">Competitions</a></li>
                        {{--<li><a href="{{ route('shirts') }}">Shirts</a></li>--}}
						<li><a href="{{ route('gallery') }}">Images</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>			
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
                        @else
							{{--Cool Notifications Coming Soom (tm)--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span style="color: #E55327;" class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="text-center">No new notifications!</li>
                                </ul>
                            </li>

                            <li><a href="{{ route('dashboard') }}"> <span class="text-primary glyphicon glyphicon-dashboard" aria-hidden="true"></span></a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <small><i>({{ Auth::user()->university->domain }})</i></small> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            @if(Auth::user()->admin)
                                <li><a href="{{ route('admin.index') }}"> <span class="text-danger glyphicon glyphicon-sunglasses" aria-hidden="true"></span></a></li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Vendor Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    @unless (App::environment('local'))
        <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>
    @endunless
</body>
</html>
