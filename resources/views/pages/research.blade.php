@extends('template.layouts')
@section('title', 'Research | e-lite Research Group')
@section('content')
    <style>
        /* Small Screens */
        @media (max-width: 767px) {
            #researchSideBar {
                display: none;
            }
        }

        #researchSideBar {
            position: fixed;
            top: 0;
            left: 0
        }

        body{
            margin-left: 250px;
        }
        .offcanvas-start {
            width: 250px !important;
            transition: all 0.2s ease-in-out;
        }
    </style>
    <button class="btn btn-light vh-100 rounded-0 px-0" id="researchSideBar" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#researchSidebar" aria-controls="researchSidebar"><i class="bi bi-arrow-bar-right fs-2"></i></button>

    <div class="offcanvas offcanvas-start border-0 show" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="researchSidebar" aria-labelledby="researchSidebarLabel">
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
        <div class="offcanvas-footer">
            <button type="button" class="btn btn-light rounded-0 w-100 h-100 py-2" data-bs-dismiss="offcanvas"
                id="closeSidebar"><i class="bi bi-arrow-bar-left fs-2"></i></button>
        </div>
    </div>
    <script>
        document.body.style.transition = 'margin-left 0.2s ease-in-out';
        const sidebar = document.getElementById('researchSidebar');
        const openBtn = document.getElementById('researchSideBar');
        const closeBtn = document.getElementById('closeSidebar');

        // Open Sidebar & Push Content
        openBtn.addEventListener('click', function() {
            document.body.style.marginLeft = '250px';
        });

        // Close Sidebar & Reset Content
        closeBtn.addEventListener('click', function() {
            document.body.style.marginLeft = '0px';
        });
    </script>
@endsection
