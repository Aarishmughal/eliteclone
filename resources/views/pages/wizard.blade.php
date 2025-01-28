<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Add Content Wizard | AUMC Research Group</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .custom-tooltip {
            font-family: 'Inter' !important;
        }

        #back-button {
            top: 10px;
            left: 10px;
        }

        #username-text {
            top: 10px;
            right: 10px;
        }

        #theme-toggle {
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="row m-0 d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-6 col-sm-10">
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <h3 class="card-title mb-4">Select Content to Add</h3>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="{{ Route('people.add') }}" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-person me-2"></i>Add People</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-kanban me-2"></i>Add Project</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-people me-2"></i>Add Publication</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-file-bar-graph me-2"></i>Add Research Papers</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-pencil-square me-2"></i>Add Teaching Material</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-file-earmark-medical me-2"></i>Add Thesis</a>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-body-secondary mt-3">
                &copy; {{ __(now()->year) }} AUMC, Inc
            </p>
        </div>
    </div>
    @include('template.toast')

    <!-- Back Button -->
    <a class="nav-link m-lg-3 m-md-2 m-sm-2 px-3 py-2 fs-5 position-fixed" id="back-button" href="{{ route('home') }}">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Top Right Text -->
    <p class="m-lg-3 m-md-2 m-sm-2 px-3 py-2 position-fixed fw-normal border rounded-5" id="username-text"
        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Currently logged in as"
        data-bs-custom-class="custom-tooltip">
        {{ Auth::user()->username }}</p>

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
