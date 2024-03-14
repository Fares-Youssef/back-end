<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eslam</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
</head>

<body>
    <script src="{{ asset('js/jquery-3.7.1.min.js
    ') }}"></script>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style=" font-size:large;" dir="rtl">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Eslam
                </a>
                @auth

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    العملاء
                                </a>
                                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('client.create') }}">
                                        عميل جديد
                                    </a>
                                    <a class="dropdown-item" href="{{ route('client.index') }}">
                                        كل العملاء
                                    </a>
                                    <a class="dropdown-item" href="{{ route('account.create') }}">
                                        تسقيط دفعة
                                    </a>
                                    <a class="dropdown-item" href="{{ route('account.index') }}">
                                        كشف حساب للعميل
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    القماش
                                </a>
                                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('cloth.create') }}">
                                        استلام قماش
                                    </a>
                                    <a class="dropdown-item" href="{{ route('cloth.index') }}">
                                        كل القماش
                                    </a>
                                    <a class="dropdown-item" href="{{ route('cloth.toShow') }}">
                                        بيان عن قماش معين
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    القص
                                </a>
                                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('cut.toCreate') }}">
                                        قص جديد
                                    </a>
                                    <a class="dropdown-item" href="{{ route('cut.index') }}">
                                        بيان بكل القص
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    تسليم
                                </a>
                                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('give.toCreate') }}">
                                        تسليم جديد
                                    </a>
                                    <a class="dropdown-item" href="{{ route('give.index') }}">
                                        بيان بكل التسليمات
                                    </a>
                                </div>
                            </li>
                            <a href="ssss" class="nav-link d-none">
                                <li class="nav-item dropdown">
                                    عمالة
                                </li>
                            </a>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        تسجيل حساب جديد
                                    </a>
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
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
</body>

</html>
