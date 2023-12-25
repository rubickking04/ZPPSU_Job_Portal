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
        <nav class="navbar sticky-top shadow-sm">
            <div class="container-fluid px-4">
                <a class=" navbar-nav navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                    role="button">
                    <lord-icon src="https://cdn.lordicon.com/wgwcqouc.json" trigger="morph"
                        colors="primary:#B71C1C,secondary:#B71C1C" stroke="60" style="width:30px;height:30px"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                <p class="navbar-brand mb-0 navbar-text active text-truncate">{{ __('Employer\'s Portal') }}
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
        <div class="offcanvas offcanvas-start w-auto container" tabindex="-1" id="offcanvas" data-bs-keyboard="true" data-bs-backdrop="true">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    <a href="{{ url('/') }}" class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-danger border-3" src="{{ asset('/storage/images/avatar.png') }}" height="60" width="60">
                    </a>
                    <span class="container fs-4">{{ Auth::guard('employer')->user()->name }}</span>
                    <a class="nav-link">
                        <span class="text-danger d-flex justify-content-center  text-uppercase small">{{ __('Employer\'s Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link">
                            <span class="text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.home') }}" class="nav-link text-truncate">
                            <i class="fs-4 bi bi-graph-up-arrow  text-danger"></i>
                            <span class="ms-2 text-black" aria-current="page">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.posts.jobs') }}" class="nav-link text-truncate">
                            <i class="fs-4 bi bi-file-earmark-post text-danger"></i>
                            <span class="ms-2 text-black" aria-current="page">{{ __('Post Jobs') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.jobs') }}" class="nav-link text-truncate">
                            <i class="fs-4 fa-solid fa-briefcase text-danger"></i>
                            <span class="ms-2 text-black" aria-current="page">{{ __('Jobs') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.requests') }}" class="nav-link text-truncate">
                            <i class="fs-4 fa-solid fa-comment-dots text-danger"></i>
                            <span class="ms-2 text-black" aria-current="page">{{ __('Request') }}</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#"class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#table-collapse" aria-expanded="true">
                        <i class="fs-4 fa-solid fa-table text-danger"></i>
                        <span class="ms-2  text-black">{{ __('Data Tables') }}</span>
                    </a>
                        <div class="collapse container" id="table-collapse">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-black">{{ __('Farmers Table ') }}<span class="badge text-bg-primary">{{ __('('.App\Models\User::all()->count().')') }}</span> </span></a></li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="{{ route('employer.logout') }}" class="d-flex px-3 align-items-center nav-link text-truncate"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fs-5 text-danger"></i><span
                            class="ms-2 text-black">{{ __('Sign out') }}</span> </a>
                </div>
                <form id="logout-form" action="{{ route('employer.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="py-2">
                    <div class="container-fluid">
                        {{-- <div class="row">
                            <div class="col-12 mt-3">
                                <h4>{{  __('Admin Dashboard')  }}</h4>
                            </div>
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                <ol class="breadcrumb py-1">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('Home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                            </nav>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card mb-3" >
                                    <div class="card-body h-100">
                                        <div class="row">
                                            <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                                                <h2 class="users-count" id="users-count">{{ number_format(App\Models\User::all()->count()) }}</h2>
                                                <h5>{{ __('Total Customers') }}</h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-auto col-6 mt-3 text-end">
                                                <i class="fa-solid fa-user fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                                                <h2>{{ number_format(App\Models\Store::all()->count()) }}</h2>
                                                <h5>{{ __('Total Stores') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto text-end col-6 mt-3 ">
                                                <i class="fa-solid fa-store fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                                                <h2>{{ number_format(App\Models\Product::all()->count()) }}</h2>
                                                <h5>{{ __('Total Products') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto col-6 text-end col-6 mt-3 ">
                                                <i class="fa-solid fa-bag-shopping fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                                                <h2>{{ number_format(App\Models\Order::all()->count()) }}</h2>
                                                <h5>{{ __('Total Orders') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto col-6 text-end col-6 mt-3 ">
                                                <i class="fa-solid fa-cart-shopping fs-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

</body>
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>

</html>
