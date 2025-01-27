<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary shadow-sm mb-2">
        <div class="container-fluid">
            <!-- Brand Section -->
            <a class="navbar-brand d-flex align-items-center" href="{{ Route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="34"
                    class="d-inline-block align-text-top">
                <b class="ms-2" id="brand-title">AUMC</b>
            </a>

            <!-- Toggler for Offcanvas -->
            <button class="navbar-toggler mb-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Offcanvas Navbar -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <b class="offcanvas-title fs-3" id="offcanvasNavbarLabel" id="brand-title">AUMC
                    </b>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Navigation Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item m-1">
                            <a class="nav-link px-3 {{ request()->is('news') ? 'active' : '' }}" aria-current="page"
                                href="{{ Route('news') }}">News</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="nav-link px-3 {{ request()->is('people') ? 'active' : '' }}"
                                href="{{ Route('people') }}">People</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="nav-link px-3 {{ request()->is('research') ? 'active' : '' }}"
                                href="{{ Route('research') }}">Research</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="nav-link px-3 {{ request()->is('teaching') ? 'active' : '' }}"
                                href="#">Teaching</a>
                        </li>
                        <li class="nav-item m-1 dropdown">
                            <a class="nav-link px-3 dropdown-toggle {{ request()->is('thesis') ? 'active' : '' }}"
                                href="#" role="button" aria-expanded="false">
                                Thesis
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Offers</a></li>
                                <li><a class="dropdown-item" href="#">Completed</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right-aligned Links -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        @guest
                        @else
                            <li class="nav-item mx-1 dropdown" style="width: 100%">
                                <a class="nav-link dropdown-toggle ps-3" href="#" role="button"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end custom-dropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                </ul>
                            </li>
                        @endguest
                        <li class="nav-item mx-1">
                            <button class="nav-link px-3 py-2" id="theme-toggle"><i class="bi"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center pt-3 mt-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-0 me-2 text-body-secondary text-decoration-none lh-1">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" height="34" />
                </a>
                <span class="text-body-secondary lh-1" style="font-family: 'Inter'">
                    &copy; {{ __(now()->year) }} AUMC, Inc
                </span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex align-items-center mb-0">
                @guest
                    <li class="ms-3 d-flex align-items-center">
                        <a class="text-body-secondary fw-normal {{ request()->routeIs('login') ? 'link-active' : '' }} badge"
                            href="{{ route('login') }}">Admin Login</a>
                    </li>
                @else
                    <li class="ms-3 d-flex align-items-center">
                        <a class="text-body-secondary fw-normal {{ request()->routeIs('login') ? 'link-active' : '' }} badge"
                            href="{{ route('login') }}">Logout</a>
                    </li>
                @endguest
                <li class="ms-3 d-flex align-items-center">
                    <a class="text-body-secondary" href="#"><i class="bi bi-twitter"></i></a>
                </li>
                <li class="ms-3 d-flex align-items-center">
                    <a class="text-body-secondary" href="#"><i class="bi bi-instagram"></i></a>
                </li>
                <li class="ms-3 d-flex align-items-center">
                    <a class="text-body-secondary" href="#"><i class="bi bi-facebook"></i></a>
                </li>
            </ul>
        </footer>
        <p class="text-secondary text-center mb-4 form-text">Built with <a href="https://laravel.com/">Laravel</a>,
            <a href="https://getbootstrap.com/">Bootstrap</a> & ♥
        </p>
    </div>
    <div class="toast-container">
        @if (session('error'))
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-x-circle"></i>
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
