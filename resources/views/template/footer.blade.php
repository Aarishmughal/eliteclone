<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center pt-3 mt-4 border-top">
        <div class="col-12 col-sm-4 d-flex align-items-center">
            <a href="/" class="mb-0 me-2 text-body-secondary text-decoration-none lh-1">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="34" />
            </a>
            <span class="text-body-secondary lh-1" style="font-family: 'Inter'">
                &copy; {{ __(now()->year) }} AUMC, Inc
            </span>
        </div>
        <ul class="nav col-12 col-sm-4 d-flex align-items-center justify-content-end list-unstyled mb-0">
            @guest
                <li class="ms-3 d-flex align-items-center">
                    <a class="text-body-secondary fw-normal {{ request()->routeIs('login') ? 'link-active' : '' }} badge"
                        href="{{ route('login') }}">Admin Login</a>
                </li>
            @else
                <li class="ms-3 d-flex align-items-center">
                    <a class="text-body-secondary fw-normal {{ request()->routeIs('login') ? 'link-active' : '' }} badge"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            @endguest
            <li class="ms-3
                        d-flex align-items-center">
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
