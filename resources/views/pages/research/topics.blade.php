@extends('template.layouts')
@section('title', 'Research Topics | e-lite Research Group')
@section('content')
    <div class="container p-3">
        <h1 class="mb-4 border-bottom">Research Topics</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <a href="#" class="text-decoration-none p-0" title="Click to Learn More" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" data-bs-custom-class="custom-tooltip">
                    <div class="card p-3 custom-person-card">
                        <h4>Topic Title <i class="bi bi-file-earmark-text"></i></h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat,
                            molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel erat sed nulla tempus
                            condimentum.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
