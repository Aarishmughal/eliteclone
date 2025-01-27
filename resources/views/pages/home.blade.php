@extends('template.layouts')
@section('title', 'Home | e-lite Research Group')
@section('content')
<div class="container d-flex align-items-center justify-content-center " style="height: 75vh">
    <div class="card p-4 shadow-lg" id="hero-card">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="text-start">e-Lite: Intelligent and Interactive Systems</h1>
                <p>The e-Lite research group develops and studies innovative technologies applied to interactive
                    applications. The spirit of the research is the integration of complex systems, based on the
                    interaction between humans and technology, in which the complexity gap is managed by
                    intelligent
                    software components.</p>
            </div>
            <div class="col-lg-5">
                <div class="card bg-info-subtle border-0">
                    <h4 class="card-header p-3 bg-dark-subtle">Quick Links</h4>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item border-info-subtle list-group-item-action list-group-item-info">
                                <a href="#">News <i class="bi bi-arrow-right"></i></a>
                            </li>
                            <li class="list-group-item border-info-subtle list-group-item-action list-group-item-info">
                                <a href="#">People <i class="bi bi-arrow-right"></i></a>
                            </li>
                            <li class="list-group-item border-info-subtle list-group-item-action list-group-item-info">
                                <a href="#">Research <i class="bi bi-arrow-right"></i></a>
                            </li>
                            <li class="list-group-item border-info-subtle list-group-item-action list-group-item-info">
                                <a href="#">Teaching <i class="bi bi-arrow-right"></i></a>
                            </li>
                            <li class="list-group-item border-info-subtle list-group-item-action list-group-item-info">
                                <a href="#">Thesis <i class="bi bi-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="card custom-home-card h-100 d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h1 class="fs-1"><i class="bi bi-book-half icon"></i></h1>
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Publications</h5>
                    </a>
                    <p class="card-text flex-grow-1">Our publications are available through PORTO@Iris, the open
                        repository of publications produced by the scientific community of Politecnico di Torino.</p>
                    <a href="#" class="btn btn-light mt-auto">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card custom-home-card h-100 d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h1 class="fs-1"><i class="bi bi-rocket-takeoff icon"></i></h1>
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Projects and Collaborations</h5>
                    </a>
                    <p class="card-text flex-grow-1">We actively collaborate with international associations, non-profit
                        and public institutions, as well as industrial partners. Have a look at our current and past
                        collaborations!</p>
                    <a href="#" class="btn btn-light mt-auto">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card custom-home-card h-100 d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h1 class="fs-1"><i class="bi bi-lightbulb icon"></i></h1>
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Research Topics</h5>
                    </a>
                    <p class="card-text flex-grow-1">Discover our research topics and our commitment to the Open Source
                        community, through the software tools we create. Check out our research!</p>
                    <a href="#" class="btn btn-light mt-auto">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection