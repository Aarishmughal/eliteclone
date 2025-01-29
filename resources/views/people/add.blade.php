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
    <title>Add People | AUMC Research Group</title>
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
    <div class="row m-0 mt-5 d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-6 col-sm-10">
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <h3 class="card-title mb-4">Add People</h3>
                    <form action="{{ route('people.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="image" class="form-label mb-1">Person Image<button
                                            class="btn pe-auto p-0 ms-1 pb-1" type="button" data-bs-toggle="tooltip"
                                            data-bs-custom-class="custom-tooltip" data-bs-placement="right"
                                            title="Recommended Size: 100x100 pixels & less than 5MBs."><i
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
                                    <input type="text" class="form-control @error('mname') is-invalid @enderror"
                                        value="{{ old('mname') }}" id="mname" name="mname"
                                        placeholder="Middle Name">
                                    <label for="mname">Middle Name<span class="text-danger">*</span></label>
                                    @if ($errors->has('mname'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('mname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('lname') is-invalid @enderror"
                                        value="{{ old('lname') }}" id="lname" name="lname"
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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" id="email" name="email"
                                        placeholder="Email Address">
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
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                        name="gender">
                                        <option disabled selected>Select an Option</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    <label for="gender">Gender<span class="text-danger">*</span></label>
                                    @if ($errors->has('gender'))
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" style="font-family: 'Inter">+92</span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="number"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" id="gender" placeholder="Phone Number">
                                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                @if ($errors->has('phone'))
                                    <div>
                                        <span
                                            class="text-danger small custom-error m-0">{{ $errors->first('phone') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <div class="form-floating">
                                    <textarea class="form-control" style="height: 100px" placeholder="Bio" id="bio" name="bio">{{ old('bio') }}</textarea>
                                    <label for="bio">Short Bio</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg">
                                <p class="mb-1">Social Media Links</p>
                                <button class="btn btn-light" onclick="addSocialMediaRow(event)">Add Link</button>
                            </div>
                        </div>
                        <div id="socialMediaLinks" class="mb-3"></div>
                        <button type="submit" class="btn btn-light w-100 mb-2">Add People</button>
                        <div class="row">
                            <div class="col-lg">
                                <div class="card p-3 bg-warning-subtle">
                                    <h5 class="card-title text-danger">Important Notes:</h5>
                                    <div class="card-body">
                                        <ul class="m-0" style="font-family: var(--button-font)">
                                            <li>This <code>person</code> will also be available to be assigned as the
                                                <code>Administrator</code>.
                                            </li>
                                            <li>There is no password as of this step for the user.</li>
                                            <li>You or any other <code>Administrator</code> will be prompted to assign a
                                                password to the user when trying to Promote the user to
                                                <code>Administrator</code>.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
