@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div id="auth" class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid" style="background-color: #fff">
    <div class="row align-items-center vh-100">
        <div class="col-lg-4 d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <h2 class="h3 text-center mb-3">
                    تسجيل الدخول الي حسابك
                </h2>
                <form method="POST" action="{{ route('login') }}" dir="ltr">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control  @error('email') is-invalid @enderror" placeholder="your userName" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            password
                        </label>
                        <div class="input-group input-group-flat">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Your password">
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
                    </div>
                </form>
            </div>
        </div>
            <!-- Photo -->
            <div id="homeImg"class="col-lg-8">
                {{-- style="background-image: url('{{ asset('img/wallpaperflare.com_wallpaper (2).png') }}')"> --}}
                <div  class="img">
                </div>
            </div>
    </div>
</div>

@endsection
