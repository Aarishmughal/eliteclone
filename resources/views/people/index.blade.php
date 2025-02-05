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
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
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

        @media screen and (max-width: 768px) {
            .top-margin {
                margin-top: 50px;
                margin-left: 20px;
                margin-right: 20px;
            }

            /* #username-text {
                display: none;
            } */
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
    <div class="row mt-5 p-2 d-flex justify-content-center align-items-center vh-100 top-margin">
        <div class="col-lg-10 col-sm-12">
            <h1>Manage People</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                @foreach ($users as $user)
                    <div class="col">
                        <div class="card custom-person-card rounded-4">
                            <div class="card-body pt-0">
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/logo.png') }}"
                                    class="rounded-circle my-3" style="height: 100px;width: 100px;object-fit: cover;" />
                                <h5 class="card-title">{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}
                                </h5>
                                <p class="m-0">{{ $user->bio }}</p>
                                <div class="mb-2 text-end"><a href="#"
                                        class="fst-italic person-email">{{ $user->email }}</a>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @foreach ($socialLinks as $socialLink)
                                        @if ($socialLink->user_id == $user->id)
                                            <a href="{{ $socialLink->account_link }}" target="_blank" class="fs-3"><i
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
                                    data-bs-placement="top" data-bs-title="Remove" data-bs-custom-class="custom-tooltip"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                        class="bi bi-trash"></i></button>
                                <button href="#" class="btn btn-dark flex-grow-1 rounded-4"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Administrator"
                                    data-bs-custom-class="custom-tooltip"><i class="bi bi-person"></i></button>
                            </div>
                        </div>
                        <form action="{{ route('people.delete', $user->id) }}" method="POST"
                            id="delete-form{{ $user->id }}">@csrf</form>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">Remove
                                            Person?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="font-family: 'Inter">
                                        Are you sure you want to remove this person from the website's People
                                        section?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="event.preventDefault(); document.getElementById('delete-form{{ $user->id }}').submit();">Yes,
                                            Remove</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-body-secondary">
                &copy; {{ __(now()->year) }} AUMC, Inc
            </p>
        </div>

    </div>

    @include('template.admin.layouts')
</body>


</html>
