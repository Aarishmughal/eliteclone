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
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <title>Add Publication | AUMC Research Group</title>
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

        #editor {
            min-height: 150px;
            max-height: 150px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }

        .btn {
            font-family: var(--button-font) !important;
        }

        .btn-danger:hover {
            background-color: #350100 !important;
            border-color: #350100 !important;
            transition: all 0.1s ease !important;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="row m-0 mt-5 d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-6 col-sm-10">
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <h3 class="card-title mb-4">Add Publication</h3>
                    <form action="{{ route('publications.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" id="title" name="title"
                                        placeholder="Project Title">
                                    <label for="title">Publication Title<span class="text-danger">*</span></label>
                                    @if ($errors->has('title'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        id="type" name="type" value="{{ old('type') }}"
                                        placeholder="Publication Type">
                                    <label for="type">Publication Type</label>
                                    @if ($errors->has('type'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control @error('year') is-invalid @enderror"
                                        id="year" name="year" value="{{ old('year') }}"
                                        placeholder="Publication Year">
                                    <label for="year">Publication Year</label>
                                    @if ($errors->has('year'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('year') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="url" class="form-control @error('doi') is-invalid @enderror"
                                        value="{{ old('doi') }}" id="doi" name="doi"
                                        placeholder="Publication DOI URL">
                                    <label for="doi">Publication DOI URL</label>
                                    @if ($errors->has('doi'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('doi') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="url" class="form-control @error('iris') is-invalid @enderror"
                                        value="{{ old('iris') }}" id="iris" name="iris"
                                        placeholder="Publication IRIS URL">
                                    <label for="iris">Publication IRIS URL</label>
                                    @if ($errors->has('iris'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('iris') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg d-flex h-100 align-items-center">
                                <p class="text-secondary fw-bold mb-0 me-3">AUTHORS</p>
                                <button class="btn btn-light me-1" onclick="addAuthorRow(event)">Add Author</button>
                                <button class="btn pe-auto p-0 ms-1 pb-1" type="button" data-bs-toggle="tooltip"
                                    data-bs-custom-class="custom-tooltip" data-bs-placement="right"
                                    title="Copy Paste Names of Authors. Dropdown is Under-development."><i
                                        class="bi bi-info-circle"></i></button>
                            </div>
                            @if ($errors->has('author'))
                                <span class="text-danger small custom-error mt-2">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                        <div id="AuthorsSection" class="mb-3"></div>
                        <hr>
                        <p class="text-secondary fw-bold">JOURNAL</p>
                        <div class="border p-3 mb-3 rounded">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" id="journal[name]" name="journal[name]"
                                            value="{{ old('journal.name') }}" placeholder="Name"
                                            class="form-control @error('journal.name') is-invalid @enderror" />
                                        <label for="journal[name]">Name</label>
                                        @if ($errors->has('journal.name'))
                                            <span
                                                class="text-danger small custom-error m-0">{{ $errors->first('journal.name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-floating">
                                        <input type="text" id="journal[edition]" name="journal[edition]"
                                            placeholder="Edition"
                                            class="form-control @error('journal.edition') is-invalid @enderror"
                                            value="{{ old('journal.edition') }}" />
                                        <label for="journal[edition]">Edition</label>
                                        @if ($errors->has('journal.edition'))
                                            <span
                                                class="text-danger small custom-error m-0">{{ $errors->first('journal.edition') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-floating">
                                        <input type="text" id="journal[volume]" name="journal[volume]"
                                            placeholder="Volume"
                                            class="form-control @error('journal.volume') is-invalid @enderror"
                                            value="{{ old('journal.volume') }}" />
                                        <label for="journal[volume]">Volume</label>
                                        @if ($errors->has('journal.volume'))
                                            <span
                                                class="text-danger small custom-error m-0">{{ $errors->first('journal.volume') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-floating">
                                        <input type="number" id="journal[page]" name="journal[page]"
                                            placeholder="Page Number"
                                            class="form-control @error('journal.page') is-invalid @enderror"
                                            value="{{ old('journal.page') }}" />
                                        <label for="journal[page]">Page Number</label>
                                        @if ($errors->has('journal.page'))
                                            <span
                                                class="text-danger small custom-error m-0">{{ $errors->first('journal.page') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light w-100 mb-2">Add Publication</button>
                    </form>
                </div>
            </div>

            <p class="text-body-secondary mt-3">
                &copy; {{ __(now()->year) }} AUMC, Inc
            </p>
        </div>
    </div>
    @include('template.admin.layouts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        let authorCount = 1;
        const maxAuthors = 5;

        function addAuthorRow(event) {
            event.preventDefault();

            if (authorCount <= maxAuthors) {
                const div = document.createElement("div");
                div.className = "border p-3 mb-2 rounded";
                div.id = `Author${authorCount}`;
                div.innerHTML = `<div class="row mb-2">
                                    <div class="col-lg-6 col-sm-12 text-start">
                                        <p class="text-secondary fst-italic" id="authorName${authorCount}">
                                            Author #${authorCount}
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 text-end">
                                        <button class="btn btn-danger" onclick="removeAuthorRow(this)">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                id="authorFirstName${authorCount}"
                                                name="authors[${authorCount}][fname]"
                                                placeholder="First Name"
                                                class="form-control"
                                            />
                                            <label for="authorFirstName${authorCount}">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                id="authorMiddleName${authorCount}"
                                                name="authors[${authorCount}][mname]"
                                                placeholder="Middle Name"
                                                class="form-control"
                                            />
                                            <label for="authorMiddleName${authorCount}">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                id="authorLastName${authorCount}"
                                                name="authors[${authorCount}][lname]"
                                                placeholder="Last Name"
                                                class="form-control"
                                            />
                                            <label for="authorLastName${authorCount}">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                `;
                document.getElementById("AuthorsSection").appendChild(div);
                authorCount++;
            } else {
                alert(`Maximum of ${maxAuthors} Authors exceeded!`);
            }
        }

        function updateCountryCode(index) {
            const countrySelect = document.getElementById(`authorCountry${index}`);
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const countryCode = selectedOption.getAttribute("data-code");

            document.getElementById(`authorCountryCode${index}`).value = countryCode;
        }

        function removeAuthorRow(button) {
            const AuthorId = button.closest(".border").id;
            document.getElementById(AuthorId).remove();
            authorCount--;
        }
    </script>
</body>

</html>
