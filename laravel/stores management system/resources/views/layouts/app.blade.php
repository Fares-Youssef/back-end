<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-flags.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-payments.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
</head>

<body dir="rtl">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <div id="app">
        @auth
            <div id="load" class="load">
                <div class="center">
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                </div>
            </div>

            <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none"
                style="margin-right: 15rem;font-size: large;" dir="ltr">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                        aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-nav flex-row order-md-last" dir="rtl">
                        <div class="nav-link dropdown-toggle mr-auto">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ Auth::user()->name }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow">
                                <a href="{{ route('register') }}" class="dropdown-item">تسجبل حساب جديد</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                    class="dropdown-item">تسجيل الخروج</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="navbar navbar-vertical navbar-right navbar-expand-lg" dir="ltr" style="font-size: large"
                data-bs-theme="dark">
                <div class="container-fluid" dir="rtl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                        aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="{{ route('home') }}" class="text-center">
                        <h1 class="navbar-brand navbar-brand-autodark">
                            {{ config('app.name') }}
                        </h1>
                    </a>
                    <div class="collapse navbar-collapse" id="sidebar-menu">
                        <ul class="navbar-nav pt-lg-3">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <span class="nav-link-title">
                                        الصفحة الرئيسية
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-title">
                                        المخازن / الكبائن
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ route('store.create') }}">
                                                المخازن
                                            </a>
                                            <a class="dropdown-item" href="{{ route('cabin.create') }}">
                                                الكبائن
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-title">
                                        المنتجات
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ route('product.create') }}">
                                                اضافة منتج جديد
                                            </a>
                                            <a class="dropdown-item" href="{{ route('in.create') }}">
                                                ايداع الي المخزن
                                            </a>
                                            <a class="dropdown-item" href="{{ route('out.create') }}">
                                                سحب من المخزن
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-title">
                                        التقارير
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ route('report.products') }}">
                                                تقرير منتجات
                                            </a>
                                            <a class="dropdown-item" href="{{ route('report.cabins') }}">
                                                تقرير مخازن
                                            </a>
                                            <a class="dropdown-item" href="{{ route('report.toIn') }}">
                                                تقرير ايداع
                                            </a>
                                            <a class="dropdown-item" href="{{ route('report.toOut') }}">
                                                تقرير صرف
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        @endauth
        <main class="page-wrapper" style="position: relative;">

            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            document.getElementById('load').style.display = "none";
        });
        $('.load').click(function() {
            document.getElementById('load').style.display = "block";
        })
    </script>
    <script src="{{ asset('js/tabler.min.js') }}"></script>
    <script src="{{ asset('js/demo.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
</body>

</html>
