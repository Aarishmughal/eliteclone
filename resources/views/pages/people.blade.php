@extends('template.layouts')
@section('title', 'People | e-lite Research Group')
@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-9">
                <h1>e-Lite Group Members</h1>
            </div>
            <div class="col-lg-3 border-start">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-0"><a href="#current-members"
                            class="text-decoration-none active px-2 py-1">Current
                            Members</a></li>
                    <li class="list-group-item"><a href="#alumni" class="text-decoration-none">Alumni</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col" id="current-members">
                <h3 class="fst-italic">Current Members</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mt-2">
                <div class="card custom-person-card rounded-4">
                    <div class="card-body pt-0">
                        <img src="https://plchldr.co/i/100x100" class="rounded-circle my-3" />
                        <h5 class="card-title">Person Name</h5>
                        <p class="m-0">Some Quick Bio.</p>
                        <div class="mb-2 text-end"><a href="#" class="fst-italic person-email">email@address.com</a>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="fs-3"><i class="bi bi-link-45deg"></i></a>
                            <a href="#" class="fs-3"><i class="bi bi-link-45deg"></i></a>
                            <a href="#" class="fs-3"><i class="bi bi-link-45deg"></i></a>
                            <a href="#" class="fs-3"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
