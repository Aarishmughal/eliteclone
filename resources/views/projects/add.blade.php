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
    <title>Add Project | AUMC Research Group</title>
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
                    <h3 class="card-title mb-4">Add Project</h3>
                    <form action="{{ route('projects.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="image" class="form-label mb-1">Project Header Image<button
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
                                        placeholder="Project Title">
                                    <label for="title">Project Title<span class="text-danger">*</span></label>
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
                                    <input type="website" class="form-control @error('website') is-invalid @enderror"
                                        value="{{ old('website') }}" id="website" name="website"
                                        placeholder="Project Website">
                                    <label for="website">Project Website</label>
                                    @if ($errors->has('website'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('website') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="card" class="form-control @error('card') is-invalid @enderror"
                                        value="{{ old('card') }}" id="card" name="card"
                                        placeholder="Project Card URL">
                                    <label for="card">Project Card URL</label>
                                    @if ($errors->has('card'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('card') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date" value="{{ old('start_date') }}">
                                    <label for="start_date">Project Start Date</label>
                                    @if ($errors->has('start_date'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    <label for="end_date">Project End Date</label>
                                    @if ($errors->has('end_date'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <p class="mb-1">Project Description<button
                                    class="btn pe-auto p-0 ms-1 pb-1" type="button" data-bs-toggle="tooltip"
                                    data-bs-custom-class="custom-tooltip" data-bs-placement="right"
                                    title="If text is not visible in the text box, try changing the site theme to Light."><i
                                        class="bi bi-info-circle"></i></button></p>
                                <div id="editor">
                                </div>
                                <!-- Hidden input to store Quill content -->
                                <input type="hidden" name="project_description" id="project_description">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('reference_number') is-invalid @enderror"
                                        value="{{ old('reference_number') }}" id="reference_number"
                                        name="reference_number" placeholder="Project reference_number">
                                    <label for="reference_number">Project Reference Number</label>
                                    @if ($errors->has('reference_number'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('reference_number') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('grant_currency') is-invalid @enderror"
                                        id="grant_currency" name="grant_currency">
                                        <option disabled selected>Select an Option</option>
                                        <option value="USD $"
                                            {{ old('grant_currency') == 'male' ? 'selected' : '' }}>USD $
                                        </option>
                                        <option value="EUR €"
                                            {{ old('grant_currency') == 'female' ? 'selected' : '' }}>
                                            EUR €
                                        </option>
                                    </select>
                                    <label for="grant_currency">Grant Currency</label>
                                    @if ($errors->has('grant_currency'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('grant_currency') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" style="font-family: 'Inter" id="grant_amount">USD
                                        $</span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="number"
                                            class="form-control @error('grant_amount') is-invalid @enderror"
                                            name="grant_amount" value="{{ old('grant_amount') }}" id="gender"
                                            placeholder="grant_amount Number">
                                        <label for="grant_amount">Grant Amount</label>
                                    </div>
                                </div>
                                @if ($errors->has('grant_amount'))
                                    <div>
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('grant_amount') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <p class="mb-1">Work Packages</p>
                                <button class="btn btn-light" onclick="addWorkPackageRow(event)">Add Work
                                    Package</button>
                            </div>
                        </div>
                        <div id="workPackages" class="mb-3"></div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <p class="mb-1">Partners</p>
                                <button class="btn btn-light" onclick="addPartnerRow(event)">Add Partner</button>
                            </div>
                        </div>
                        <div id="partnersSection" class="mb-3"></div>
                        <button type="submit" class="btn btn-light w-100 mb-2">Add Project</button>
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
        document.getElementById('grant_currency').addEventListener('change', function() {
            document.getElementById('grant_amount').textContent = this.value;
        });
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('project_description').value = quill.root.innerHTML;
        });
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        let workPackageCount = 1;
        const maxWorkPackages = 5;

        function addWorkPackageRow(event) {
            event.preventDefault();

            if (workPackageCount <= maxWorkPackages) {
                const div = document.createElement("div");
                div.className = "row";

                div.innerHTML = `
            <div class="col-lg">
                <div class="form-floating mb-3">
                    <input type="text" id="workPackage${workPackageCount}" 
                        name="workPackages[${workPackageCount}][name]" 
                        placeholder="Enter Work Package Name" 
                        class="form-control" />
                    <label for="workPackage${workPackageCount}">Work Package ${workPackageCount} Name</label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="pb-3">
                    <button class="btn btn-danger w-100 h-100 p-3" 
                        onclick="removeWorkPackageRow(this)">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>    
            </div>
        `;

                document.getElementById("workPackages").appendChild(div);
                workPackageCount++;
            } else {
                alert(`Maximum of ${maxWorkPackages} work packages exceeded!`);
            }
        }

        function removeWorkPackageRow(button) {
            const row = button.closest(".row");
            document.getElementById("workPackages").removeChild(row);
            workPackageCount--;
        }

        let partnerCount = 1;
        const maxPartners = 5;

        function addPartnerRow(event) {
            event.preventDefault();

            if (partnerCount <= maxPartners) {
                const div = document.createElement("div");
                div.className = "border p-3 mb-3 rounded";
                div.id = `partner${partnerCount}`;
                div.innerHTML = `
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            id="partnerName${partnerCount}"
                            name="partners[${partnerCount}][name]"
                            placeholder="Partner Name"
                            class="form-control"
                        />
                        <label for="partnerName${partnerCount}">Partner Name</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-floating mb-3">
                        <input
                            type="url"
                            id="partnerWebsite${partnerCount}"
                            name="partners[${partnerCount}][website]"
                            placeholder="Website (optional)"
                            class="form-control"
                        />
                        <label for="partnerWebsite${partnerCount}"
                            >Website (Optional)</label
                        >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-floating mb-3">
                        <select
                            class="form-select"
                            id="partnerCountry${partnerCount}"
                            name="partners[${partnerCount}][country]"
                            onchange="updateCountryCode(${partnerCount})"
                        >
                            <option value="" disabled selected>Select Country</option>
                            <option value="United States" data-code="US">
                                United States - US
                            </option>
                            <option value="United Kingdom" data-code="GB">
                                United Kingdom - GB
                            </option>
                            <option value="Canada" data-code="CA">Canada - CA</option>
                            <option value="Germany" data-code="DE">Germany - DE</option>
                            <option value="France" data-code="FR">France - FR</option>
                            <option value="India" data-code="IN">India - IN</option>
                            <option value="Pakistan" data-code="PK">Pakistan - PK</option>
                            <option value="Australia" data-code="AU">Australia - AU</option>
                            <option value="China" data-code="CN">China - CN</option>
                            <option value="Japan" data-code="JP">Japan - JP</option>
                        </select>
                        <label for="partnerCountry${partnerCount}">Country</label>
                        <input
                            type="hidden"
                            id="partnerCountryCode${partnerCount}"
                            name="partners[${partnerCount}][country_code]"
                        />
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            id="partnerType${partnerCount}"
                            name="partners[${partnerCount}][type]"
                            placeholder="Type"
                            class="form-control"
                        />
                        <label for="partnerType${partnerCount}">Type</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-check mb-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="partnerAssociated${partnerCount}"
                            name="partners[${partnerCount}][is_associated]"
                            value="1"
                        />
                        <label
                            class="form-check-label"
                            for="partnerAssociated${partnerCount}"
                            >Is Associated?</label
                        >
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 text-end">
                <button
                    class="btn btn-danger"
                    onclick="removePartnerRow(this)">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </div>
        `;

                document.getElementById("partnersSection").appendChild(div);
                partnerCount++;
            } else {
                alert(`Maximum of ${maxPartners} partners exceeded!`);
            }
        }

        function updateCountryCode(index) {
            const countrySelect = document.getElementById(`partnerCountry${index}`);
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const countryCode = selectedOption.getAttribute("data-code");

            document.getElementById(`partnerCountryCode${index}`).value = countryCode;
        }

        function removePartnerRow(button) {
            const partnerId = button.closest(".border").id;
            document.getElementById(partnerId).remove();
            partnerCount--;
        }
    </script>
</body>

</html>
