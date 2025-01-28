<div class="toast-container">
    @if (session('error'))
        <script>
            $(document).ready(function() {
                $('#errorToast').toast('show');
            });
        </script>
        <div id="errorToast" class="toast align-items-center text-bg-danger border-0 fade" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-animation="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body pb-0">
                    <p>
                        <i class="bi bi-x-circle"></i>
                        {{ session('error') }}
                    </p>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#successToast').toast('show');
            });
        </script>
        <div id="successToast" class="toast align-items-center text-bg-success border-0 fade" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-animation="true" data-bs-autohide="true"
            data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body pb-0">
                    <p>
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                    </p>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
</div>
