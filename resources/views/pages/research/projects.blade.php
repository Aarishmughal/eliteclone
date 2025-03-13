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

        .card-text {
            line-height: 1.5;
            max-height: 10em;
            /* Adjust based on line-height and desired truncation */
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 6;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            word-break: break-word;
        }
    </style>
    <div class="container p-3">
        <h1>Projects</h1>
        <ul class="nav nav-tabs " id="projectsTab" role="tablist">
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
        <div class="tab-content">
            <!-- Ongoing Projects Tab -->
            <div class="tab-pane fade show active" id="ongoing-pane" role="tabpanel" aria-labelledby="ongoing"
                tabindex="0">
                @foreach ($projects as $project)
                    @if (empty($project->end_date) || $project->end_date >= now()->format('Y-m-d'))
                        <div class="card my-4 custom-person-card">
                            <div class="card-title p-3 d-flex align-items-center">
                                <h4 class="me-3">{{ $project->title }}</h4>
                                <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/logo.png') }}"
                                    height="100px" width="50%" alt="placeholder">
                            </div>
                            <div class="card-body">
                                <div class="card-text">{!! $project->description !!}</div>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <small class="text-muted me-auto">{{ $project->start_date }} -
                                    {!! $project->end_date ? $project->end_date . ' <em>Expected</em>' : 'Ongoing' !!}
                                </small>
                                <a href="{{ Route('projects.fetch', ['id' => $project->id]) }}" class="btn btn-primary text-light">Read
                                    More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Completed Projects Tab -->
            <div class="tab-pane fade" id="completed-pane" role="tabpanel" aria-labelledby="completed" tabindex="0">
                @foreach ($projects as $project)
                    @if (!empty($project->end_date) && $project->end_date < now()->format('Y-m-d'))
                        <div class="card my-4 custom-person-card">
                            <div class="card-title p-3 d-flex align-items-center">
                                <h4 class="me-3">{{ $project->title }}</h4>
                                <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/logo.png') }}"
                                    height="100px" width="50%" alt="placeholder">
                            </div>
                            <div class="card-body">
                                <div class="card-text">{!! $project->description !!}</div>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <small class="text-muted me-auto">{{ $project->start_date }} -
                                    {{ $project->end_date }}</small>
                                <a href="{{ Route('projects.fetch', ['id' => $project->id]) }}" class="btn btn-primary text-light">Read
                                    More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection
