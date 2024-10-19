@include('dashboard.partials._header')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<style>
    .fluent--delete-48-regular {
        display: inline-block;
        width: 24px;
        height: 24px;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath fill='%23dc0404' d='M20 10.5v.5h8v-.5a4 4 0 0 0-8 0m-2.5.5v-.5a6.5 6.5 0 1 1 13 0v.5h11.25a1.25 1.25 0 1 1 0 2.5h-2.917l-2 23.856A7.25 7.25 0 0 1 29.608 44H18.392a7.25 7.25 0 0 1-7.224-6.644l-2-23.856H6.25a1.25 1.25 0 1 1 0-2.5zm-3.841 26.147a4.75 4.75 0 0 0 4.733 4.353h11.216a4.75 4.75 0 0 0 4.734-4.353L36.324 13.5H11.676zM21.5 20.25a1.25 1.25 0 1 0-2.5 0v14.5a1.25 1.25 0 1 0 2.5 0zM27.75 19c.69 0 1.25.56 1.25 1.25v14.5a1.25 1.25 0 1 1-2.5 0v-14.5c0-.69.56-1.25 1.25-1.25'/%3E%3C/svg%3E");
    }

    .mdi--users-add {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23000' d='M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z'/%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .mynaui--edit-one {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cg fill='none' stroke='%23000' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.4'%3E%3Cpath d='M9.533 11.15A1.823 1.823 0 0 0 9 12.438V15h2.578c.483 0 .947-.192 1.289-.534l7.6-7.604a1.822 1.822 0 0 0 0-2.577l-.751-.751a1.822 1.822 0 0 0-2.578 0z'/%3E%3Cpath d='M21 12c0 4.243 0 6.364-1.318 7.682C18.364 21 16.242 21 12 21c-4.243 0-6.364 0-7.682-1.318C3 18.364 3 16.242 3 12c0-4.243 0-6.364 1.318-7.682C5.636 3 7.758 3 12 3'/%3E%3C/g%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .icon-park-solid--data-user {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cg fill='none' stroke='%23000' stroke-linecap='round' stroke-linejoin='round' stroke-width='4'%3E%3Cpath d='M22 8v12c0 2.21-4.03 4-9 4s-9-1.79-9-4V8'/%3E%3Cpath d='M22 14c0 2.21-4.03 4-9 4s-9-1.79-9-4'/%3E%3Cpath fill='%23000' d='M22 8c0 2.21-4.03 4-9 4s-9-1.79-9-4s4.03-4 9-4s9 1.79 9 4'/%3E%3Cpath d='M32 6h6a4 4 0 0 1 4 4v6M16 42h-6a4 4 0 0 1-4-4v-6'/%3E%3Ccircle cx='35' cy='29' r='5' fill='%23000'/%3E%3Cpath fill='%23000' d='M44 44H26a9 9 0 1 1 18 0'/%3E%3C/g%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .carbon--report-data {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cpath fill='%23000' d='M15 20h2v4h-2zm5-2h2v6h-2zm-10-4h2v10h-2z'/%3E%3Cpath fill='%23000' d='M25 5h-3V4a2 2 0 0 0-2-2h-8a2 2 0 0 0-2 2v1H7a2 2 0 0 0-2 2v21a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2M12 4h8v4h-8Zm13 24H7V7h3v3h12V7h3Z'/%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .carbon--add-filled {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cpath fill='%23000' d='M16 2A14.173 14.173 0 0 0 2 16a14.173 14.173 0 0 0 14 14a14.173 14.173 0 0 0 14-14A14.173 14.173 0 0 0 16 2m8 15h-7v7h-2v-7H8v-2h7V8h2v7h7Z'/%3E%3Cpath fill='none' d='M24 17h-7v7h-2v-7H8v-2h7V8h2v7h7z'/%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .zondicons--view-show {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath fill='%23000' d='M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10m9.8 4a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0-2a2 2 0 1 1 0-4a2 2 0 0 1 0 4'/%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .fluent--camera-16-filled {
        display: inline-block;
        width: 24px;
        height: 24px;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%23000' d='M10 8a2 2 0 1 1-4 0a2 2 0 0 1 4 0M5.276 2.83A1.5 1.5 0 0 1 6.618 2h2.764a1.5 1.5 0 0 1 1.342.83L11.309 4H12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h.691zM11 8a3 3 0 1 0-6 0a3 3 0 0 0 6 0'/%3E%3C/svg%3E");
        background-color: currentColor;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
    }

    .select2-selection {
        height: 35px !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #e3e6ef !important;
    }

    .select2-selection__arrow {
        top: 15px !important;
    }

    .tagify--focus {
        --tags-border-color: #8231D3 !important;
    }
</style>
<style>
    div.dataTables_filter {
        text-align: left !important
    }

    #messageDiv {
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
    }

    .success {
        background-color: #4CAF50;
        /* Green */
    }

    .error {
        background-color: #f44336;
        padding: 1%;
        margin: 1%;
        color: white;
    }

    * {
        font-family: "Rubik", sans-serif !important;
    }

    .page-item.active .page-link {
        background-color: #8231d3;
        border-color: #8231d3
    }

    .page-link,
    .page-link:hover,
    .page-link:focus {
        color: #8231D3
    }

    .page-link:focus {
        box-shadow: 0 0 0 .25rem #8231d359;
    }

    .sidebar__menu-group ul.sidebar_nav li>a .toggle-icon:before {
        content: "\f104";
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered,
    .select2-container--default .select2-results__option {
        text-align: right;
    }

    .accordion-button:not(.collapsed) {
        background-color: transparent
    }

    .accordion-button:not(.collapsed)::after {
        background-image: url('https://www.iconpacks.net/icons/2/free-arrow-down-icon-3101-thumb.png')
    }

    .sidebar__menu-group ul.sidebar_nav li>a .toggle-icon {
        font-family: "Line Awesome Free" !important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" rel="stylesheet"
    type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>

<body class="layout-light side-menu">

    <div class="mobile-author-actions"></div>
    <header class="header-top">
        @include('dashboard.partials._top_nav')
    </header>
    <main class="main-content">
        <div class="sidebar-wrapper">
            <aside class="sidebar sidebar-collapse" id="sidebar">
                @include('dashboard.partials._menu')
            </aside>
        </div>

        <div class="contents">
            <script>
                @if ($errors->any())

                    $(document).ready(function() {
                        Swal.fire({
                            type: 'error',
                            title: 'خطأ',
                            html: '{!! implode('<br>', $errors->all()) !!}'
                        })
                    });
                @endif
                @if (session('success'))
                    $(document).ready(function() {
                        Swal.fire({
                            type: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    });
                @elseif (session('error'))
                    $(document).ready(function() {
                        Swal.fire({
                            type: 'error',
                            title: 'خطأ',
                            html: '{!! session('error') !!}'
                        })
                    });
                @endif
            </script>

            @yield('content')
        </div>
        <footer class="footer-wrapper">
            @include('dashboard.partials._footer')
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
    </div>

    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dir: "ltr"
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll(".deleteButton");
            deleteButtons.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent default form submission behavior
                    if (confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟")) {
                        button.parentNode.submit();
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('datatable/datatables.min.js') }}"></script>

    <script>
        new DataTable('#example', {
            responsive: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.7/i18n/ar.json',
            },
        });
        $(document).ready(function() {
            $('.numberInput').on('input', function() {
                var inputVal = $(this).val();
                var num = parseFloat(inputVal);
                if (isNaN(num) || num < 0) {
                    $(this).val('');
                    Swal.fire({
                        type: 'error',
                        title: '{{ __('Oops...') }}',
                        html: 'The number must be positive'
                    })
                }
            });
        });
        $('select').select2();
    </script>


</body>

</html>
