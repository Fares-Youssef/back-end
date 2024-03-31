@extends('layouts.app')

@section('content')
    <div class="container py-4">
        @if (Session::has('done'))
            <div class="alert alert-success alert-dismissible py-3" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        تم العملية بنجاح
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        @if (Session::has('remove'))
            <div class="alert alert-danger alert-dismissible py-3" role="alert">
                <div class="d-flex">
                    <div>
                        لا تستطيع الحذف
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <form class="card card-md w-75 m-auto" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">تسجيل حساب جديد</h2>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" col-lg-6 mb-3">
                        <label class="form-label">User name</label>
                        <input type="text" class="form-control @error('userName') is-invalid @enderror" name="userName"
                            value="{{ old('userName') }}" autocomplete="userName">
                        @error('userName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">الرقم السري</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">تأكيد الرقم السري</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">تسجيل حساب جديد</button>
                </div>
            </div>
        </form>
        <div class="card my-3">
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="card-title m-0">كل المشتركين المسجلين</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-center">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>اسم المشترك</th>
                            <th>user name</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->userName }}</td>
                                <td>
                                    <a href="{{ route('user.destroy', $item->id) }}"><span class="btn btn-danger"
                                            onclick="confirm('هل انت متاكد؟')">
                                            delete
                                        </span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
