@extends('template.layouts')
@section('title', 'Research Projects | e-lite Research Group')
@section('content')
    <style>
        .nav-link {
            color: var(--text-color) !important;
        }

        .active {
            border-radius: 0px !important;
            border: none !important;
            background-color: transparent !important;
            color: var(--primary-color) !important;
        }
    </style>
    <div class="container p-3">
        <h1>Projects</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item mx-2" role="presentation">
                <button class="nav-link active" id="ongoing" data-bs-toggle="tab" data-bs-target="#ongoing-pane"
                    type="button" role="tab" aria-controls="ongoing-pane" aria-selected="true">Ongoing
                    Projects</button>
            </li>
            <li class="nav-item mx-2" role="presentation">
                <button class="nav-link" id="completed" data-bs-toggle="tab" data-bs-target="#completed-pane" type="button"
                    role="tab" aria-controls="completed-pane" aria-selected="false">Completed
                    Projects</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="ongoing-pane" role="tabpanel" aria-labelledby="ongoing"
                tabindex="0">
                <div class="card my-3 custom-person-card">
                    <div class="card-title p-3 d-flex align-items-center">
                        <h4 class="me-3">PROJECT TITLE</h4>
                        <img src="https://placehold.co/100x100" alt="placeholder">
                    </div>
                    <div class="card-body">
                        <p class="card-text">PROJECT DESCRIPTION. Some quick example text to build on the card title and
                            make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <small class="text-muted me-auto">YEAR START - YEAR END</small>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="completed-pane" role="tabpanel" aria-labelledby="completed" tabindex="0">
                <div class="card my-3 custom-person-card">
                    <div class="card-title p-3 d-flex align-items-center">
                        <h4 class="me-3">PROJECT TITLE</h4>
                        <img src="https://placehold.co/100x100" alt="placeholder">
                    </div>
                    <div class="card-body">
                        <p class="card-text">PROJECT DESCRIPTION. Some quick example text to build on the card title and
                            make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <small class="text-muted me-auto">YEAR START - YEAR END</small>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
