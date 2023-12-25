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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-light bg-dark sticky-top shadow-sm">
            <div class="container px-4">
                <a class=" navbar-nav navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                    role="button">
                    <lord-icon src="https://cdn.lordicon.com/wgwcqouc.json" trigger="morph"
                        colors="primary:#ffffff,secondary:#ffffff" stroke="60" style="width:30px;height:30px"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                <p class="navbar-brand mb-0 navbar-text active text-truncate text-white">{{ __('Administrator\'s Portal') }}
                </p>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
                    <li class="nav-item text-black">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="35"height="35" class="rounded-circle">
                        {{-- {{ Auth::guard('employer')->user()->name }} --}}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto container text-white bg-dark" tabindex="-1" id="offcanvas" data-bs-keyboard="true" data-bs-backdrop="true">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    <a href="{{ url('/') }}" class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-danger border-3" src="{{ asset('/storage/images/avatar.png') }}" height="60" width="60">
                    </a>
                    <span class="container fs-4">{{ Auth::guard('admin')->user()->name }}</span>
                    <a class="nav-link">
                        <span class="text-danger d-flex justify-content-center  text-uppercase small text-white">{{ __('Administrator\'s Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start text-white" id="menu">
                    <li class="nav-item text-white">
                        <a class="nav-link ">
                            <span class="text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.home') }}" class="nav-link text-truncate text-white">
                            <i class="fs-4 bi bi-graph-up-arrow"></i>
                            <span class="ms-2" aria-current="page">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.posts.jobs') }}" class="nav-link text-truncate">
                            <i class="fs-4 fa-solid fa-briefcase   text-white"></i>
                            <span class="ms-2  text-white" aria-current="page">{{ __('Employers') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.jobs') }}" class="nav-link text-truncate">
                            <i class="fs-4 fa-solid fa-user text-white"></i>
                            <span class="ms-2  text-white" aria-current="page">{{ __('Users') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.requests') }}" class="nav-link text-truncate">
                            <i class="fs-4 fa-solid fa-comment-dots  text-white"></i>
                            <span class="ms-2  text-white" aria-current="page">{{ __('Jobs') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.requests') }}" class="nav-link text-truncate">
                            <i class="fs-4 fa-solid fa-user-check  text-white"></i>
                            <span class="ms-2  text-white" aria-current="page">{{ __('Applicant') }}</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="{{ route('admin.logout') }}" class="d-flex px-3 align-items-center nav-link text-truncate"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fs-5  text-white"></i><span
                            class="ms-2  text-white">{{ __('Sign out') }}</span> </a>
                </div>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="py-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

</body>
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>

</html>
