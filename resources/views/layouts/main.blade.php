<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RHU Appointment System</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- jquery -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
</head>
<body>
    <!-- nav bar -->
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white border">
        <div class="container">
            <a class="navbar-brand text-accent-one" href="">
             <strong> RHU Appointment System</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav ml-auto">
                        <li class=" bg-white"><a href="" class="btn btn-two">Home</a></li>
                        <li class=" bg-white"><a href="" class="btn btn-two">{{session()->get('name')}}</a></li>
                        <li class="bg-white"><a class="btn btn-one btn-primary" href=""
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- end navbar -->
       @yield('content')
    </body>
</html>
