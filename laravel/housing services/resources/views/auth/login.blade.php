@extends('layouts.app')

@section('content')
    <div class=" d-flex flex-column bg-white">
        <div class="row g-0 flex-fill">
            <div class="col-12 col-lg-6 col-xl-4 d-flex flex-column justify-content-center">
                <div class="container container-tight my-5 px-lg-5">
                    <h2 class="h3 text-center mb-3">
                        تسجيل الدخول الي حسابك
                    </h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">User name</label>
                            <input type="text" value="{{ old('email') }}" name="email" autofocus
                                class="form-control @error('email') is-invalid @enderror" placeholder="username"
                                autocomplete="off">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="your password" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
                <div class="bg-cover h-100 min-vh-100"
                    style="background-image: url('{{ asset('img/11235346_10586.jpg') }}')">
                </div>
            </div>
        </div>
    </div>
@endsection
