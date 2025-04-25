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
                @foreach ($publicationsByYear as $publicationByYear)
                    
                @endforeach
                <div class="mt-3">
                    <h5 class="fw-bold border-bottom">Year 2023</h5>
                    <ul class="text-body" style="font-family: 'Inter'">
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                    </ul>
                </div>
                <div class="mt-3">
                    <h5 class="fw-bold border-bottom">Year 2022</h5>
                    <ul class="text-body" style="font-family: 'Inter'">
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="byType-pane" role="tabpanel" aria-labelledby="byType" tabindex="0">
                <div class="mt-3">
                    <h5 class="fw-bold border-bottom">TYPE ABC</h5>
                    <ul class="text-body" style="font-family: 'Inter'">
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                        <li>
                            AUTHORS, YEAR, TITLE, TYPE, JOURNAL_NAME, JOURNAL_EDITION, JOURNAL_VOLUME, JOURNAL_PAGE_NUMBER,
                            DOI_LINK, IRIS_LINK
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
