<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <style>
        .list-link {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            padding: 0 10px;
            display: inline-block;
            position: relative;
            color: #0087ca;
        }
        .list-link:hover{
            color: white;
            /* text-decoration: underline; */
        }
        .list-link::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 4px;
            bottom: 0;
            left: 0;
            border-radius: 20px;
            background-color: #B71C1C;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .list-link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .list-links {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            padding: 0 10px;
            display: inline-block;
            position: relative;
            color: #0087ca;
        }
        .list-links:hover{
            color: white;
            /* text-decoration: underline; */
        }
        .list-links::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 4px;
            bottom: 0;
            left: 0;
            border-radius: 20px;
            background-color: #B71C1C;
            transform-origin: bottom center;
            transition: transform 0.25s ease-out;
        }
        .list-links:hover::after {
            transform: scaleX(1);
            transform-origin: bottom center;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #FAFAFA">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="align-top" src="{{ asset('/storage/images/logo.png') }}" height="40" width="40"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link list-link active fs-5" aria-current="page" href="{{ route('user.home') }}">{{ __('Find Jobs') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list-link active fs-5" href="#">{{ __('My Jobs') }}</a>
                    </li>
                </ul>
                <ul class="mx-auto navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link list-link active fs-5 text-white" href="#"></a>
                    </li>
                </ul>
                <ul class="mx-auto navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link list-links active  fs-2" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <div class="hstack gap-3">
                        {{-- @guest --}}
                        <li class="nav-item">
                            <a class="nav-link list-link active fs-5" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                        </li>
                        {{-- @endguest --}}
                        {{-- @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user fs-5"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth --}}
                        <div class="vr mt-2" style="height: 25px;"></div>
                        <li class="nav-item">
                            <a class="nav-link list-link active fs-5" href="{{ route('employer.login') }}">{{ __('Employer / Post Jobs') }}</a>
                        </li>
                    </div>
                </ul>
            </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hides() {
        var x = document.getElementById("password-confirm");
        var show_eye = document.getElementById("show_eyes");
        var hide_eye = document.getElementById("hide_eyes");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

</html>
