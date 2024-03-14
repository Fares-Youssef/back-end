@extends('layouts.app')

@section('content')
    <div class="container container-tight py-5">
        <div class="m-auto">
            @if (Session::has('done'))
                <div class="alert alert-success alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            تمت الاضافة بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <form action="{{ route('sub.create') }}" class="card card-md" method="get" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تسجيل اشتراك جديد</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">الرقم الوظيفي</label>
                                <input type="text"
                                    class="form-control @error('num') is-invalid @enderror
                                @if (Session::has('error')) is-invalid @endif @if (Session::has('er')) is-invalid @endif"
                                    name="num" value="{{ old('num') }}" autofocus>
                                @error('num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if (Session::has('error'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>هذا الرقم الوظيفي غير صحيح</strong>
                                    </span>
                                @endif
                                @if (Session::has('er'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>هذا العامل مسجل هذا الشهر بالفعل</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
