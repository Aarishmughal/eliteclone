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
    <title>Manage Content Wizard | AUMC Research Group</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
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
                    <h3 class="card-title mb-4">Select Content to Manage</h3>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="{{ Route('people.index') }}"
                                class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-person me-2"></i>Manage People</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-kanban me-2"></i>Manage Project</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-people me-2"></i>Manage Publication</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-file-bar-graph me-2"></i>Manage Research Papers</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-pencil-square me-2"></i>Manage Teaching Material</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <a href="#" class="btn btn-light-outline btn-lg w-100 text-start"><i
                                    class="bi bi-file-earmark-medical me-2"></i>Manage Thesis</a>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-body-secondary mt-3">
                &copy; {{ __(now()->year) }} Innovative Consultancy Hub, Inc
            </p>
        </div>
    </div>
    @include('template.admin.layouts')
</body>


</html>
