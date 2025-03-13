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
        <a href="{{ $project->website }}">PROJECT WEBSITE <i class="bi bi-box-arrow-up-right"></i></a>
        <div>{!! $project->description !!}</div>
        @if (!empty($workPackages))
            <div class="mt-5">
                <h1>Work Packages</h1>
                <ul>
                    @foreach ($workPackages as $workPackage)
                        <li>{{ 'WP' . $workPackage->number . ': ' . $workPackage->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (!empty($partners))
            <div class="mt-5">
                <h1>Partners</h1>
                <ul>
                    @foreach ($partners as $partner)
                        @if (!$partner->is_associated)
                            <li><a href="{{ $partner->website }}">{{ $partner->name . ' - ' . $partner->country_code }}</a>
                                {{ empty($partner->type) ? '' : '(' . $partner->type . ')' }}
                            </li>
                        @endif
                    @endforeach
                </ul>
                <p class="fw-bold">ASSOCIATED PARTNERS</p>
                <ul>
                    @foreach ($partners as $partner)
                        @if ($partner->is_associated)
                            <li><a href="{{ $partner->website }}">{{ $partner->name . ' - ' . $partner->country_code }}</a>
                                {{ empty($partner->type) ? '' : '(' . $partner->type . ')' }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-5">
            <h1>More Information</h1>
            <ul>
                <li>
                    Reference Number:
                    <span class="fst-italic">{{ $project->reference_number }}</span>
                </li>
                <li>Start Date:
                    <span class="fst-italic
                        ">{{ $project->start_date }}</span>
                </li>
                <li>End Date:
                    <span
                        class="fst-italic
                        ">{{ $project->end_date ? $project->end_date : 'Ongoing' }}</span>
                </li>
                <li>Duration:
                    @php
                        $start = \Carbon\Carbon::parse($project->start_date);
                        $end = \Carbon\Carbon::parse($project->end_date);
                        $diffInDays = $start->diffInDays($end);
                        $diff = $start->diff($end);
                    @endphp

                    <span class="fst-italic">
                        @if ($diffInDays >= 365)
                            {{ $diff->y }} years, {{ $diff->m }} months
                        @elseif ($diffInDays >= 30)
                            {{ $diff->y * 12 + $diff->m }} months, {{ $diff->d }} days
                        @else
                            {{ $diffInDays }} days
                        @endif
                    </span>
                </li>
                <li>Grant Amount:
                    <span
                        class="fst-italic
                        ">{{ $project->grant_amount . ' ' . Str::substr($project->grant_currency, 0, -2) }}</span>
                </li>
                <li>Countries Involved:
                    @foreach ($partners as $partner)
                        <span class="fst-italic">{{ $partner->country_code }} | </span>
                    @endforeach
                </li>
                <li><a href="{{ $project->card }}">Project Card</a></li>
            </ul>
        </div>
        <hr>
        <div class="d-flex gap-2">
            <a href="{{ Route('projects') }}" class="btn btn-primary text-light" style="width: 50%"><i class="bi bi-arrow-left"></i> Back to
                Projects</a>
        </div>
    </div>
@endsection
