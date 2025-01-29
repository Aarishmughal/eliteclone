@extends('template.layouts')
@section('title', 'People | e-lite Research Group')
@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-9">
                <h1>Innovative Consultancy Hub Group Members</h1>
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
        @foreach ($users as $user)
            @if ($loop->iteration % 3 === 1)
                <!-- Start a new row for every 3 users -->
                <div class="row mb-3">
            @endif
            <div class="col-lg-4 col-md-6 col-sm-12 mt-2">
                <div class="card custom-person-card rounded-4">
                    <div class="card-body pt-0">
                        {{-- @dd($users) --}}
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/logo.png') }}"
                            class="rounded-circle my-3" style="height: 100px;width: 100px;object-fit: cover;" />
                        <h5 class="card-title">{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</h5>
                        <p class="m-0">{{ $user->bio }}</p>
                        <div class="mb-2 text-end"><a href="#" class="fst-italic person-email">{{ $user->email }}</a>
                        </div>
                        <div class="d-flex justify-content-end">
                            @foreach ($socialLinks as $socialLink)
                                @if ($socialLink->user_id == $user->id)
                                    <a href="{{ $socialLink->account_link }}" class="fs-3"><i
                                            class="bi bi-{{ strtolower($socialLink->platform_name) }}"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if ($loop->iteration % 3 === 0 || $loop->last)
    </div>
    @endif
    @endforeach
    </div>
@endsection
