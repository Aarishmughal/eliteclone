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
    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <title>Add Research Topic | AUMC Research Group</title>
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
            /* Adjust height as needed */
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            /* margin-bottom: 20px; */
            /* Ensures spacing below */
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="row m-0 mt-5 d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-6 col-sm-10">
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <h3 class="card-title mb-4">Add Research Topic</h3>
                    <form action="{{ route('researchTopics.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="image" class="form-label mb-1">Research Topic Header Image<button
                                            class="btn pe-auto p-0 ms-1 pb-1" type="button" data-bs-toggle="tooltip"
                                            data-bs-custom-class="custom-tooltip" data-bs-placement="right"
                                            title="Recommended Size: 100x600 pixels & less than 5MBs."><i
                                                class="bi bi-info-circle"></i></button></label>
                                    <input type="file"
                                        class="form-control form-control-lg @error('image') is-invalid @enderror"
                                        name="image" id="image" accept=".png,.pneg,.jpg,.jpeg,.webp,.svg"
                                        placeholder="Upload file">
                                    @if ($errors->has('image'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" id="title" name="title"
                                        placeholder="Research Topic Title">
                                    <label for="title">Reseach Topic Title<span class="text-danger">*</span></label>
                                    @if ($errors->has('title'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <p class="mb-1">Research Topic Description<button class="btn pe-auto p-0 ms-1 pb-1"
                                        type="button" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip"
                                        data-bs-placement="right"
                                        title="If text is not visible in the text box, try changing the site theme to Light."><i
                                            class="bi bi-info-circle"></i></button></p>
                                <div id="editor">
                                </div>
                                <!-- Hidden input to store Quill content -->
                                <input type="hidden" name="researchTopic_description" id="researchTopic_description">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <p class="mb-1">Publications</p>
                                <button class="btn btn-light" onclick="addPublicationRow(event)">Add
                                    Publication</button>
                            </div>
                        </div>
                        <div id="publications" class="mb-3"></div>
                        <button type="submit" class="btn btn-light w-100 mb-2">Add Research Topic</button>
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
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('researchTopic_description').value = quill.root.innerHTML;
        });
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        let publicationCount = 1;
        const maxPublicationCount = 5;
        const publicationsData = @json($publications);

        function addPublicationRow(event) {
            event.preventDefault();

            if (publicationCount <= maxPublicationCount) {
                const div = document.createElement("div");
                div.className = "row";

                // Create the inner HTML manually without Blade stuff
                div.innerHTML = `
            <div class="col-lg">
                <div class="form-floating mb-3">
                    <select class="form-select" id="publication${publicationCount}" name="publication${publicationCount}">
                        <option disabled selected>Select an Option</option>
                    </select>
                    <label for="publication${publicationCount}">Publication#${publicationCount}</label>
                    <span class="text-danger small custom-error m-0" id="error-publication${publicationCount}" style="display:none;"></span>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="pb-3">
                    <button class="btn btn-danger w-100 h-100 p-3" onclick="removePublicationRow(this)">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>    
            </div>
        `;

                document.getElementById("publications").appendChild(div);

                populatePublicationSelect(publicationCount); // Populate options dynamically
                publicationCount++;
            } else {
                alert(`Maximum of ${maxPublicationCount} Publications exceeded!`);
            }
        }

        function populatePublicationSelect(count) {
            const select = document.getElementById(`publication${count}`);

            publicationsData.forEach(publication => {
                const option = document.createElement('option');
                option.value = publication.id; // Adjust field if needed
                option.textContent = publication.title + ". " + publication.year;
                select.appendChild(option);
            });
        }

        function removePublicationRow(button) {
            event.preventDefault();
            const row = button.closest(".row");
            document.getElementById("publications").removeChild(row);
            publicationCount--;
        }
    </script>
</body>

</html>
