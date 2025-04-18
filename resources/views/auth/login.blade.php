<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <title>Admin Login | AUMC Research Group</title>
    <style>
        #back-button {
            top: 10px;
            left: 10px;
        }

        #theme-toggle {
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>

<body style="margin: 0; padding: 0; width: 100vw; height: 100vh; overflow: hidden;">
    <!-- Main Content -->
    <div class="row m-0">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card shadow-lg p-3">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Administrator Login</h3>
                        <form action="{{ Route('authenticate') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Email Address">
                                <label for="email">Email address</label>
                                @if ($errors->has('email'))
                                    <span
                                        class="text-danger small custom-error m-0">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span
                                        class="text-danger small custom-error m-0">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <a href="#" class="form-text badge fw-normal p-0" style="font-size: 0.8rem">Forgot
                                Password?</a>
                            <button type="submit" class="btn btn-light w-100 mt-3">Login</button>
                        </form>
                    </div>
                </div>
                <p class="text-body-secondary mt-3">
                    &copy; {{ __(now()->year) }} AUMC, Inc
                </p>
            </div>
        </div>
    </div>
    @include('template.toast')
    <!-- Back Button -->
    <a class="nav-link m-lg-3 m-md-2 m-sm-2 px-3 py-2 fs-5 position-fixed" id="back-button" href="{{ route('home') }}">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Theme Toggle Button -->
    <button class="nav-link px-3 py-2 position-fixed" id="theme-toggle" style="bottom: 20px; right: 20px;">
        <i class="bi bi-brightness-high"></i>
    </button>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>


</html>
