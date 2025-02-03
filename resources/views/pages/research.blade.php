@extends('template.layouts')
@section('title', 'Research | e-lite Research Group')
@section('content')
    <style>
        /* Small Screens */
        @media (max-width: 767px) {
            #researchSideBarOpen {
                display: none;
            }
        }

        #researchSideBarOpen {
            position: fixed;
            top: 0;
            left: 0
        }

        .offcanvas-start {
            width: 250px !important;
            transition: all 0.2s ease-in-out;
        }
    </style>
    <button class="btn btn-light vh-100 rounded-0 px-0" id="researchSideBarOpen" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#researchSidebar" aria-controls="researchSidebar"><i class="bi bi-arrow-bar-right fs-2"></i></button>

    <div class="offcanvas offcanvas-start border-0 hide" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="researchSidebar" aria-labelledby="researchSidebarLabel">
        <div class="offcanvas-body">
            <button class="btn btn-light-outline" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Research
            </button>
            <div class="collapse" id="collapseExample">
                <p class="card card-body">
                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when
                    the user activates the relevant trigger.
                </p>
            </div>
        </div>
        <div class="offcanvas-footer">
            <button type="button" class="btn btn-light rounded-0 w-100 h-100 py-2" data-bs-dismiss="offcanvas"
                id="researchSideBarClose"><i class="bi bi-arrow-bar-left fs-2"></i></button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const researchSideBarOpen = document.getElementById("researchSideBarOpen");
            const researchSideBarClose = document.getElementById("researchSideBarClose");
            const researchSidebar = document.getElementById("researchSidebar");

            const savedState = localStorage.getItem("sideBarState") || "show";
            if (savedState === "open") {
                researchSidebar.classList.add("show");
                document.body.style.marginLeft = "250px";
            } else {
                researchSidebar.classList.remove("show");
                document.body.style.marginLeft = "0px";
            }

            // Open Sidebar & Store State
            researchSideBarOpen.addEventListener("click", function() {
                researchSidebar.classList.add("show");
                document.body.style.marginLeft = "250px";
                localStorage.setItem("sideBarState", "open");
            });

            // Close Sidebar & Store State
            researchSideBarClose.addEventListener("click", function() {
                researchSidebar.classList.remove("show");
                document.body.style.marginLeft = "0px";
                localStorage.setItem("sideBarState", "closed");
            });
        });
        document.body.style.transition = 'margin-left 0.2s ease-in-out';
    </script>
@endsection
