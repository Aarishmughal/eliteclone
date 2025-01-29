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
    <title>Manage People | AUMC Research Group</title>
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
        <div class="col-lg-10 col-sm-12">
            <div class="card shadow-lg">
                <h1 class="card-header p-3">Manage People</h1>
                <div class="card-body">
                    @foreach ($users as $user)
                        @if ($loop->iteration % 3 === 1)
                            <div class="row mb-2">
                        @endif
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                            <div class="card custom-person-card rounded-4">
                                <div class="card-body pt-0">
                                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/logo.png') }}"
                                        class="rounded-circle my-3"
                                        style="height: 100px;width: 100px;object-fit: cover;" />
                                    <h5 class="card-title">{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}
                                    </h5>
                                    <p class="m-0">{{ $user->bio }}</p>
                                    <div class="mb-2 text-end"><a href="#"
                                            class="fst-italic person-email">{{ $user->email }}</a>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        @foreach ($socialLinks as $socialLink)
                                            @if ($socialLink->user_id == $user->id)
                                                <a href="{{ $socialLink->account_link }}" target="_blank"
                                                    class="fs-3"><i
                                                        class="bi bi-{{ strtolower($socialLink->platform_name) }}"></i></a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer d-flex gap-3">
                                    <a href="{{ route('people.viewEdit', $user->id) }}"
                                        class="btn btn-light-outline flex-grow-1 rounded-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit"
                                        data-bs-custom-class="custom-tooltip"><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" class="btn btn-outline-danger flex-grow-1 rounded-4"
                                        data-bs-placement="top" data-bs-title="Remove"
                                        data-bs-custom-class="custom-tooltip" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                                    <button href="#" class="btn btn-dark flex-grow-1 rounded-4"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Administrator"
                                        data-bs-custom-class="custom-tooltip"><i class="bi bi-person"></i></button>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">VERY
                                                ALOANSIDNAIODJIWDJ</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration % 3 === 0 || $loop->last)
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <p class="text-body-secondary mt-3">
            &copy; {{ __(now()->year) }} AUMC, Inc
        </p>
    </div>
    </div>
    @include('template.admin.layouts')
</body>


</html>
