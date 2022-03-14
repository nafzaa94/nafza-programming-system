<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NAFZASYSTEM</title>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Shizuru&family=Nunito&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--
    <livewire:styles /> --}}


</head>

<body>
    <div id="app" style="padding-top: 80px">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top" style="background-color: #e0c3fc">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo2.png" alt="logo" width="130px" height="50px" style="margin-right: 30px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5 {{ Request::is('home') ? 'active' : '' }}"
                                href="{{ route('home') }}"><i class="bi bi-house-door"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5 {{ Request::is('about') ? 'active' : '' }}"
                                href="{{ route('about') }}"><i class="bi bi-book"></i> About</a>
                        </li>

                        @auth
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5 {{ Request::is('community') ? 'active' : '' }}"
                                href="{{ route('community') }}"><i class="bi bi-people"></i> Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5 {{ Request::is('video') ? 'active' : '' }}"
                                href="{{ route('video') }}"><i class="bi bi-camera-video"></i> Learn Programming With
                                Video</a>
                        </li>
                        @can('user')
                        @can('order')
                        @can('nopayment')
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5 {{ Request::is('orderproject/*') ? 'active' : '' }}"
                                href="{{ route('orderproject') }}"><i class="bi bi-cart4"></i> Order Project</a>
                        </li>
                        @elsecan('halfpayment')
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5"><i class="bi bi-credit-card-2-front"></i>
                                {{auth()->user()->status_payment}}</a>
                        </li>
                        @elsecan('fullpayment')
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-5"><i class="bi bi-credit-card-2-front"></i>
                                {{auth()->user()->status_payment}}</a>
                        </li>
                        @endcan
                        @endcan
                        @endcan
                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-danger fw-bold fs-5" href="{{ route('login') }}"><i
                                    class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item" style="margin-left: 20px">
                            <a class="nav-link btn btn-danger fw-bold fs-5" href="{{ route('register') }}"><i
                                    class="bi bi-person-plus"></i> {{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-bold fs-5 text-uppercase" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome back, {{ auth()->user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                    style="background-color: #e0c3fc; width: 250px">
                                    @can('admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('adminhome') }}"><i
                                                class="bi bi-house-door"></i> DashBoard
                                            Admin</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @endcan
                                    <li><a class="dropdown-item" href="/profile/{{auth()->user()->user_id}}"><i
                                                class="bi bi-person-circle"></i> My Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="/orderproject/purchases/{{auth()->user()->user_id}}"><i
                                                class="bi bi-bag"></i> My Purchases</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-chat-dots"></i> Chat
                                            System</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i
                                                    class="bi bi-box-arrow-right"></i> Logout</button>
                                        </form>
                                    </li>
                                </ul>

                            </li>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</body>

</html>