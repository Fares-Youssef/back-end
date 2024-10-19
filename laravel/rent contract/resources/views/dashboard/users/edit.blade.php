@extends('dashboard.layouts.app')
@section('title', 'تعديل كلمة سر المستخدم')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">{{ __('تعديل كلمة سر المستخدم') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="password">{{ __('كلمة السر') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password-confirm">{{ __('تاكيد كلمة السر') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('تعديل') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
