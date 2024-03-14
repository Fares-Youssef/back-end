{{-- <html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign up - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title> --}}
<!-- CSS files -->
{{-- <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-flags.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-payments.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
{{-- <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" /> --}}
{{-- <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{asset('js/demo-theme.min.js')}}"></script>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mb-3">
            <header class="navbar navbar-expand-md d-print-none">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                        <a href=".">
                            <img src="./static/logo.svg" width="110" height="32" alt="Tabler"
                                class="navbar-brand-image">
                        </a>
                    </h1>
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="d-none d-md-flex">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                            <div class="nav-item dropdown d-none d-md-flex me-3">
                                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                    aria-label="Show notifications">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                    </svg>
                                    <span class="badge bg-red"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Last updates</h3>
                                        </div>
                                        <div class="list-group list-group-flush list-group-hoverable">
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span
                                                            class="status-dot status-dot-animated bg-red d-block"></span>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="#" class="text-body d-block">Example 1</a>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            Change deprecated html tags to text decoration classes
                                                            (#29604)
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="list-group-item-actions">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon text-muted" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span class="status-dot d-block"></span>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="#" class="text-body d-block">Example 2</a>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            justify-content:between ⇒ justify-content:space-between
                                                            (#29734)
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="list-group-item-actions show">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon text-yellow" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span class="status-dot d-block"></span>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="#" class="text-body d-block">Example 3</a>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            Update change-version.js (#29736)
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="list-group-item-actions">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon text-muted" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span
                                                            class="status-dot status-dot-animated bg-green d-block"></span>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="#" class="text-body d-block">Example 4</a>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            Regenerate package-lock.json (#29730)
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="list-group-item-actions">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon text-muted" width="24" height="24"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                    style="background-image: url(./static/avatars/003m.jpg)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>Dunn Slane</div>
                                    <div class="mt-1 small text-muted">Research Nurse</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="#" class="dropdown-item">Status</a>
                                <a href="./profile.html" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Feedback</a>
                                <div class="dropdown-divider"></div>
                                <a href="./settings.html" class="dropdown-item">Settings</a>
                                <a href="./sign-in.html" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <div
                            class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="./#">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            First
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./#">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Second
                                        </span>
                                        <span class="badge badge-sm bg-red">2</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#navbar-third"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                        aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Third
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="./#">
                                            First
                                        </a>
                                        <a class="dropdown-item" href="./#">
                                            Second
                                        </a>
                                        <a class="dropdown-item" href="./#">
                                            Third
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="./#">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Disabled
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/tabler.min.js') }}"></script>
    <script src="{{ asset('js/demo.min.js') }}"></script>
</body>

</html> --}}


<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Maha Makboul</title>
    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-flags.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-payments.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') }}">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    <script src="{{ asset('js/code.jquery.com_jquery-3.7.0.js') }}"></script>
</head>

<body class=" d-flex flex-column">
    {{-- <script src="./dist/js/demo-theme.min.js?1684106062"></script> --}}
    <script src="{{ asset('js/demo-theme.min.js') }}"></script>
    <div id="app">
        @guest
        @else
            <nav>
                <div class="mb-3">
                    <header class="navbar navbar-expand-md d-print-none">
                        <div class="container-xl">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal p-2 pe-md-3">
                                <a href="{{ route('home') }}" class="text-decoration-none">
                                    <span class="navLink">M</span>aha
                                </a>
                            </h1>
                            <div class="navbar-nav flex-row order-md-last">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                        aria-label="Open user menu">
                                        <span class="avatar avatar-sm"
                                            style="background-image: url({{ asset('img/home.png') }})"></span>
                                        <div class="d-none d-xl-block p-2">
                                            <div>{{ Auth::user()->name }}</div>
                                            <div class="mt-1 small text-muted">super admin</div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu  dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-menu">
                                <div
                                    class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                                    <ul class="navbar-nav">
                                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('home') }}">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title p-2">
                                                    الرئيسية
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown {{ request()->is('receipt*') ? 'active' : '' }}">
                                            <a class="nav-link dropdown-toggle" href="#navbar-third"
                                                data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                                aria-expanded="false">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title p-2">
                                                    الفواتير
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('receipt.create') }}">
                                                    فاتورة جديدة
                                                </a>
                                                <a class="dropdown-item" href="{{ route('receipt.index') }}">
                                                    اجمالي فواتير
                                                </a>
                                                <a class="dropdown-item" href="{{ route('client.index') }}">
                                                    كل العملاء
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown {{ request()->is('product*') ? 'active' : '' }}">
                                            <a class="nav-link dropdown-toggle" href="#navbar-third"
                                                data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                                aria-expanded="false">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title p-2">
                                                    الخدمات
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('product.create') }}">
                                                    خدمة جديدة
                                                </a>
                                                <a class="dropdown-item" href="{{ route('product.index') }}">
                                                    اجمالي الخدمات
                                                </a>

                                            </div>
                                        </li>
                                        <li class="nav-item dropdown {{ request()->is('employee/create') ? 'active' : '' }}
                                            {{ request()->is('employee') ? 'active' : '' }}
                                            {{ request()->is('account/draw') ? 'active' : '' }}
                                            {{ request()->is('account/advance') ? 'active' : '' }}
                                            {{ request()->is('employee/totalDraw') ? 'active' : '' }}
                                            {{ request()->is('employee/totalAdvance') ? 'active' : '' }}">
                                            <a class="nav-link dropdown-toggle" href="#navbar-third"
                                                data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                                aria-expanded="false">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title p-2">
                                                    العمالة
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('employee.create') }}">
                                                    اضافة عامل جديد
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.index') }}">
                                                    كل العمال
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.draw') }}">
                                                    مسحوبات يومية
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.advance') }}">
                                                    سلفات عامة
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.totalDraw') }}">
                                                    اجمالي السحوبات
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.totalAdvance') }}">
                                                    اجمالي السلفات العامة
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown {{ request()->is('employee/in') ? 'active' : '' }}
                                            {{ request()->is('employee/out') ? 'active' : '' }}
                                            {{ request()->is('out') ? 'active' : '' }}
                                            {{ request()->is('in') ? 'active' : '' }}">
                                            <a class="nav-link dropdown-toggle" href="#navbar-third"
                                                data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                                aria-expanded="false">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title p-2">
                                                    الحضور والانصراف
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('employee.in') }}">
                                                    الحضور
                                                </a>
                                                <a class="dropdown-item" href="{{ route('employee.out') }}">
                                                    الانصراف
                                                </a>
                                                <a class="dropdown-item" href="{{ route('in.index') }}">
                                                    عرض اجمالي الحضور
                                                </a>
                                                <a class="dropdown-item" href="{{ route('out.index') }}">
                                                    عرض اجمالي الانصراف
                                                </a>
                                            </div>
                                        </li>
                                        @if (Auth::id() == 1)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#navbar-third"
                                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                                    aria-expanded="false">
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </span>
                                                    <span class="nav-link-title p-2">
                                                        الحسابات
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('account.create') }}">
                                                        توريد دفعات
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('account.index') }}">
                                                        حساب يومي
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown
                                                {{ request()->is('register') ? 'active' : '' }}
                                                {{ request()->is('shop') ? 'active' : '' }}">
                                                <a class="nav-link dropdown-toggle" href="#navbar-third"
                                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                                    aria-expanded="false">
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </span>
                                                    <span class="nav-link-title p-2">
                                                        الفروع
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('register') }}">
                                                        اضافة فرع
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('shop.index') }}">
                                                        اجمالي الفروع
                                                    </a>
                                                </div>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </nav>
        @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js') }}"></script>
    <script src="{{ asset('js/tabler.min.js') }}"></script>
    <script src="{{ asset('js/demo.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>

</html>
