@extends('template.layouts')
@section('title', 'Publications | AUMC Research Group')
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
        <h1>Publications</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item mx-2" role="presentation">
                <button class="nav-link active" id="byYear" data-bs-toggle="tab" data-bs-target="#byYear-pane" type="button"
                    role="tab" aria-controls="byYear-pane" aria-selected="true">By Year</button>
            </li>
            <li class="nav-item mx-2" role="presentation">
                <button class="nav-link" id="byType" data-bs-toggle="tab" data-bs-target="#byType-pane" type="button"
                    role="tab" aria-controls="byType-pane" aria-selected="false">By Type</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="byYear-pane" role="tabpanel" aria-labelledby="byYear" tabindex="0">
                @foreach ($publicationsByYear as $year => $publications)
                    <div class="mt-3">
                        <h5 class="fw-bold border-bottom">Year {{ $year }} <em>({{ $publications->count() }})</em>
                        </h5>
                        <ul class="text-body" style="font-family: 'Inter'">
                            @if ($publications->isEmpty())
                                <p class="text-danger">No publications found for this year.</p>
                            @else
                                @foreach ($publications as $publication)
                                    <li>
                                        @foreach ($authors as $author)
                                            @if ($author->publication_id == $publication->id)
                                                {{ $author->last_name . ' ' . $author->first_name }}
                                            @endif
                                        @endforeach
                                        . {{ $publication->year }}. {{ $publication->title }},
                                        @foreach ($journals as $journal)
                                            @if ($journal->publication_id == $publication->id)
                                                <em>
                                                    {{ $journal->name }}
                                                    {{ $journal->edition }}
                                                    {{ $journal->volume }}
                                                    {{ $journal->page_number }}.
                                                </em>
                                            @endif
                                        @endforeach
                                    </li>
                                    @if ($publication->iris)
                                        <a href="{{ $publication->iris }}">IRIS Link</a>
                                    @endif
                                    @if ($publication->doi)
                                        - DOI: <a href="{{ $publication->doi }}">{{ $publication->doi }}</a>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="byType-pane" role="tabpanel" aria-labelledby="byType" tabindex="0">
                @foreach ($publicationsByType as $type => $publications)
                    <div class="mt-3">
                        <h5 class="fw-bold border-bottom">{{ $type }} <em>({{ $publications->count() }})</em>
                        </h5>
                        <ul class="text-body" style="font-family: 'Inter'">
                            @if ($publications->isEmpty())
                                <div class="alert alert-info mt-3" role="alert">
                                    No publications found for this type.
                                </div>
                            @else
                                @foreach ($publications as $publication)
                                    <li>
                                        @foreach ($authors as $author)
                                            @if ($author->publication_id == $publication->id)
                                                {{ $author->last_name . ' ' . $author->first_name }}
                                            @endif
                                        @endforeach
                                        . {{ $publication->year }}. {{ $publication->title }},
                                        @foreach ($journals as $journal)
                                            @if ($journal->publication_id == $publication->id)
                                                <em>
                                                    {{ $journal->name }}
                                                    {{ $journal->edition }}
                                                    {{ $journal->volume }}
                                                    {{ $journal->page_number }}.
                                                </em>
                                            @endif
                                        @endforeach
                                    </li>
                                    @if ($publication->iris)
                                        <a href="{{ $publication->iris }}">IRIS Link</a>
                                    @endif
                                    @if ($publication->doi)
                                        - DOI: <a href="{{ $publication->doi }}">{{ $publication->doi }}</a>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
