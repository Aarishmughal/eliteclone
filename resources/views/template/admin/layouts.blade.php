@include('template.toast')

<!-- Back Button -->
<a class="nav-link m-lg-3 m-md-2 m-sm-2 px-3 py-2 fs-5 position-fixed" id="back-button" href="{{ route('home') }}"
    data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Go Back to Home"
    data-bs-custom-class="custom-tooltip">
    <i class="bi bi-arrow-left"></i>
</a>

<!-- Top Right Text -->
<p class="m-lg-3 m-md-2 m-sm-2 px-3 py-2 position-fixed fw-normal border rounded-5" id="username-text"
    data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Currently logged in as"
    data-bs-custom-class="custom-tooltip">
    {{ Auth::user()->fname . ' ' . Auth::user()->mname . ' ' . Auth::user()->lname }}</p>

<!-- Theme Toggle Button -->
<button class="nav-link px-3 py-2 position-fixed" id="theme-toggle" style="bottom: 20px; right: 20px;">
    <i class="bi bi-brightness-high"></i>
</button>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
