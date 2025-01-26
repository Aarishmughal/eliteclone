<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo_elite.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Admin Register | e-lite Research Group</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

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

<body>
    <!-- Back Button -->
    <a class="nav-link m-3 px-3 py-2 fs-5 position-fixed" id="back-button" href="{{ route('home') }}">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Main Content -->
    <div class="row m-0">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-6 col-sm-10">
                <div class="card shadow-lg p-3">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Register Administrator</h3>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                            value="{{ old('fname') }}" id="fname" name="fname"
                                            placeholder="First Name">
                                        <label for="fname">First Name<span class="text-danger">*</span></label>
                                        @if ($errors->has('fname'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('fname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname"
                                            placeholder="Last Name">
                                        <label for="lname">Last Name<span class="text-danger">*</span></label>
                                        @if ($errors->has('lname'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('lname') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                                            placeholder="Username">
                                        <label for="username">Username<span class="text-danger">*</span></label>
                                        @if ($errors->has('username'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                            placeholder="name@example.com">
                                        <label for="email">Email address<span class="text-danger">*</span></label>
                                        @if ($errors->has('email'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                            <option disabled selected>Select an Option</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <label for="gender">Gender</label>
                                        @if ($errors->has('gender'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-family: 'Inter">+92</span>
                                        <div class="form-floating flex-grow-1">
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="gender"
                                                placeholder="Phone Number">
                                            <label for="phone">Phone Number</label>
                                            @if ($errors->has('phone'))
                                            <span
                                                class="text-danger small custom-error m-0">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                            placeholder="Password">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        @if ($errors->has('password'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm Password">
                                        <label for="password_confirmation">Confirm Password<span
                                                class="text-danger">*</span></label>
                                        @if ($errors->has('password'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light w-100">Register</button>
                        </form>
                    </div>
                </div>

                <p class="text-body-secondary mt-3">
                    &copy; {{ __(now()->year) }} e-lite, Inc
                </p>
            </div>
        </div>
    </div>

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