<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img style="border-radius: 50px;" width="40px" height="40px" src="{{ Auth::user()->avatar }}" alt=""> <span class="caret"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @if($errors->count() > 0)
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{ route('discussions.create') }}" class="form-control btn btn-info">Create a New Discussion</a>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><a style="text-decoration: none" href="{{ route('forum') }}">Home</a></li>
                                    <li class="list-group-item"><a style="text-decoration: none" href="{{url('forum?filter=me')}}">My Discussion</a></li>
                                    <li class="list-group-item"><a style="text-decoration: none" href="{{url('forum?filter=solved')}}">Solved Discussion</a></li>
                                    <li class="list-group-item"><a style="text-decoration: none" href="{{url('forum?filter=unsolved')}}">Unsolved Discussion</a></li>
                                </ul>
                            </div>
                            @if(Auth::check())
                            @if(Auth::user()->admin)
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><a style="text-decoration: none" href="/channels/create">Create a New Channel</a></li>
                                    <li class="list-group-item"><a style="text-decoration: none" href="/channels">Channel List</a></li>
                                </ul>
                            </div>
                            @endif
                        @endif
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Channels
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($channels as $channel)
                                        <li class="list-group-item"><a style="text-decoration: none" href="{{ route('channel', ['slug' => $channel->slug]) }}">{{ $channel->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::get('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
