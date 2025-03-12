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
    <div class="container p-3 mt-3">
        <div class="d-flex gap-2 align-items-center">
            <h1 class="flex-grow-1 display-3">{{ $project->title }}</h1>
            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/logo.png') }}" height="100px"
                class="img-fluid" style="max-width: 50%; width: 25%;" alt="Project Image">
        </div>
        <div>{!! $project->description !!}</div>
        @if (!empty($workPackages))
            <div>
                <h1>Work Packages</h1>
                <ul>
                    @foreach ($workPackages as $workPackage)
                        <li>{{ 'WP' . $workPackage->number . ': ' . $workPackage->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
